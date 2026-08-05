<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengajuanRequest;
use App\Models\Instansi;
use App\Models\PengajuanPkl;
use App\Enums\StatusPengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Data profil mahasiswa Anda belum lengkap. Hubungi Admin.');
        }

        $pengajuans = PengajuanPkl::with('instansi')
                        ->where('mahasiswa_id', $mahasiswa->id)
                        ->latest()
                        ->get();

        return view('mahasiswa.pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Data profil mahasiswa Anda belum lengkap. Hubungi Admin.');
        }

        $instansi = Instansi::where('status_aktif', 1)->get();
        return view('mahasiswa.pengajuan.create', compact('instansi'));
    }

    public function store(StorePengajuanRequest $request)
    {
        $user = auth()->user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Data profil mahasiswa Anda belum lengkap. Hubungi Admin.');
        }

        $existingPengajuan = PengajuanPkl::where('mahasiswa_id', $mahasiswa->id)
            ->whereIn('status', [StatusPengajuan::MENUNGGU, StatusPengajuan::DISETUJUI])
            ->exists();

        if ($existingPengajuan) {
            return redirect()->back()->with('error', 'Anda masih memiliki pengajuan yang sedang diproses atau disetujui.');
        }

        PengajuanPkl::create([
            'mahasiswa_id' => $mahasiswa->id,
            'instansi_id' => $request->instansi_id,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'status' => StatusPengajuan::MENUNGGU,
        ]);

        return redirect()->route('mahasiswa.pengajuan.index')->with('success', 'Pengajuan PKL berhasil dikirim. Silakan tunggu verifikasi Admin.');
    }
}