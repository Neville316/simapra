<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyPengajuanRequest;
use App\Models\PengajuanPkl;
use App\Enums\StatusPengajuan;
use App\Notifications\SimapraNotification;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    // Menampilkan daftar pengajuan
    public function index(Request $request)
    {
        $query = PengajuanPkl::with(['mahasiswa.user', 'instansi']);

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengajuans = $query->latest()->paginate(10);

        return view('admin.pengajuan.index', compact('pengajuans'));
    }

    // Proses verifikasi (Approve / Reject)
    public function verify(VerifyPengajuanRequest $request, PengajuanPkl $pengajuan)
    {
        // Pastikan pengajuan masih berstatus menunggu
        if ($pengajuan->status !== StatusPengajuan::MENUNGGU) {
            return redirect()->back()->with('error', 'Pengajuan ini sudah diproses sebelumnya.');
        }

        if ($request->action === 'approve') {
            $pengajuan->update([
                'status' => StatusPengajuan::DISETUJUI,
                'catatan' => null, // Bersihkan catatan jika ada
            ]);
            return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL berhasil disetujui.');
        }

        if ($request->action === 'reject') {
            $pengajuan->update([
                'status' => StatusPengajuan::DITOLAK,
                'catatan' => $request->catatan,
            ]);
            return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL telah ditolak dengan catatan.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan.');
        // Di dalam fungsi verify()
if ($request->action === 'approve') {
    $pengajuan->update(['status' => StatusPengajuan::DISETUJUI, 'catatan' => null]);
    
    // KIRIM NOTIFIKASI
    $pengajuan->mahasiswa->user->notify(new SimapraNotification(
        'Pengajuan PKL Disetujui',
        'Pengajuan PKL Anda ke ' . $pengajuan->instansi->nama_instansi . ' telah disetujui. Menunggu penempatan.',
        'success'
    ));

    return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL berhasil disetujui.');
}

if ($request->action === 'reject') {
    $pengajuan->update(['status' => StatusPengajuan::DITOLAK, 'catatan' => $request->catatan]);
    
    // KIRIM NOTIFIKASI
    $pengajuan->mahasiswa->user->notify(new SimapraNotification(
        'Pengajuan PKL Ditolak',
        'Pengajuan PKL Anda ditolak. Catatan: ' . $request->catatan,
        'danger'
    ));

    return redirect()->route('admin.pengajuan.index')->with('success', 'Pengajuan PKL telah ditolak dengan catatan.');
    }
    }
}