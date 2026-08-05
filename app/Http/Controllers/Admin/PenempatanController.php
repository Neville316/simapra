<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanPkl;
use App\Models\PenempatanPkl;
use App\Models\PembimbingInstansi;
use App\Models\PeriodePkl;
use App\Models\Fasilitas;
use App\Enums\StatusPengajuan;
use App\Notifications\SimapraNotification;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    // Menampilkan daftar mahasiswa yang siap ditempatkan (Disetujui)
    public function index()
    {
        $pengajuans = PengajuanPkl::with(['mahasiswa.user', 'instansi'])
                        ->where('status', StatusPengajuan::DISETUJUI)
                        ->whereDoesntHave('penempatan') // Yang belum ditempatkan
                        ->latest()
                        ->get();

        $penempatans = PenempatanPkl::with(['mahasiswa.user', 'instansi', 'pembimbingInstansi.user', 'periodePkl'])
                        ->latest()
                        ->paginate(10);

        return view('admin.penempatan.index', compact('pengajuans', 'penempatans'));
    }

    // Form penempatan
    public function create(PengajuanPkl $pengajuan)
    {
        $pembimbing = PembimbingInstansi::with('user')->whereHas('instansi', function($q) use ($pengajuan) {
            $q->where('id', $pengajuan->instansi_id);
        })->get();

        $periode = PeriodePkl::where('status', 1)->get();
        $fasilitas = Fasilitas::all();

        return view('admin.penempatan.create', compact('pengajuan', 'pembimbing', 'periode', 'fasilitas'));
    }

    // Simpan data penempatan
    public function store(Request $request, PengajuanPkl $pengajuan)
    {
        $request->validate([
            'pembimbing_instansi_id' => 'required|exists:pembimbing_instansi,id',
            'periode_pkl_id' => 'required|exists:periode_pkl,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'fasilitas_id' => 'nullable|array',
            'fasilitas_id.*' => 'exists:fasilitas,id'
        ]);

        $penempatan = PenempatanPkl::create([
            'pengajuan_id' => $pengajuan->id,
            'mahasiswa_id' => $pengajuan->mahasiswa_id,
            'instansi_id' => $pengajuan->instansi_id,
            'pembimbing_instansi_id' => $request->pembimbing_instansi_id,
            'periode_pkl_id' => $request->periode_pkl_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'aktif',
        ]);

        // Simpan fasilitas jika dipilih
        if ($request->has('fasilitas_id')) {
            foreach ($request->fasilitas_id as $f_id) {
                \App\Models\MahasiswaFasilitas::create([
                    'penempatan_id' => $penempatan->id,
                    'fasilitas_id' => $f_id,
                    'status' => 'diberikan',
                ]);
            }
        }
        // Di akhir fungsi store(), sebelum return redirect()
        $penempatan->mahasiswa->user->notify(new SimapraNotification(
            'Penempatan PKL Aktif',
            'Anda telah ditempatkan di ' . $penempatan->instansi->nama_instansi . '. Silakan mulai isi logbook.',
            'success'
        ));

        $penempatan->pembimbingInstansi->user->notify(new SimapraNotification(
            'Mahasiswa Bimbingan Baru',
            'Anda memiliki mahasiswa bimbingan baru: ' . $penempatan->mahasiswa->user->name,
            'info'
        ));

        return redirect()->route('admin.penempatan.index')->with('success', 'Mahasiswa berhasil ditempatkan. Status PKL sekarang AKTIF.');
    }
}