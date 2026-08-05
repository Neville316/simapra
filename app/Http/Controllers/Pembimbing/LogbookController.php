<?php

namespace App\Http\Controllers\Pembimbing;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateLogbookRequest;
use App\Models\Logbook;
use App\Models\PenempatanPkl;
use App\Enums\StatusLogbook;
use App\Notifications\SimapraNotification;
use Illuminate\Http\Request;

class LogbookController extends Controller
{
    // Menampilkan daftar logbook yang perlu divalidasi
    public function index()
    {
        $pembimbing = auth()->user()->pembimbingInstansi;

        if (!$pembimbing) {
            return redirect()->route('pembimbing.dashboard')->with('error', 'Profil pembimbing tidak ditemukan.');
        }

        // Ambil ID mahasiswa yang dibimbing oleh pembimbing ini dan statusnya aktif
        $mahasiswaIds = PenempatanPkl::where('pembimbing_instansi_id', $pembimbing->id)
                                ->where('status', 'aktif')
                                ->pluck('mahasiswa_id');

        // Ambil logbook mahasiswa tersebut yang berstatus menunggu atau revisi
        $logbooks = Logbook::with(['mahasiswa.user'])
                        ->whereIn('mahasiswa_id', $mahasiswaIds)
                        ->whereIn('status', [StatusLogbook::MENUNGGU_VALIDASI, StatusLogbook::REVISI])
                        ->latest('tanggal')
                        ->get();

        return view('pembimbing.logbook.index', compact('logbooks'));
    }

    // Proses validasi logbook
    public function validateLogbook(ValidateLogbookRequest $request, Logbook $logbook)
    {
        // Pastikan logbook ini benar-benar milik mahasiswa bimbingan pembimbing yang login
        $pembimbing = auth()->user()->pembimbingInstansi;
        $isSupervised = PenempatanPkl::where('pembimbing_instansi_id', $pembimbing->id)
                                ->where('mahasiswa_id', $logbook->mahasiswa_id)
                                ->where('status', 'aktif')
                                ->exists();

        if (!$isSupervised) {
            abort(403, 'Anda tidak berhak memvalidasi logbook ini.');
        }

        if ($request->action === 'approve') {
            $logbook->update([
                'status' => StatusLogbook::TERVALIDASI,
                'catatan_revisi' => null,
            ]);
            return redirect()->route('pembimbing.logbook.index')->with('success', 'Logbook berhasil divalidasi.');
        }

        if ($request->action === 'reject') {
            $logbook->update([
                'status' => StatusLogbook::REVISI,
                'catatan_revisi' => $request->catatan_revisi,
            ]);
            if ($request->action === 'approve') {
    $logbook->update(['status' => StatusLogbook::TERVALIDASI, 'catatan_revisi' => null]);
    
    $logbook->mahasiswa->user->notify(new SimapraNotification(
        'Logbook Tervalidasi',
        'Logbook tanggal ' . $logbook->tanggal->format('d M Y') . ' telah divalidasi pembimbing.',
        'success'
    ));
    // ...
}

        if ($request->action === 'reject') {
            $logbook->update(['status' => StatusLogbook::REVISI, 'catatan_revisi' => $request->catatan_revisi]);
            
            $logbook->mahasiswa->user->notify(new SimapraNotification(
                'Logbook Perlu Revisi',
                'Logbook tanggal ' . $logbook->tanggal->format('d M Y') . ' perlu direvisi. Catatan: ' . $request->catatan_revisi,
                'danger'
            ));
            // ...
}
            return redirect()->route('pembimbing.logbook.index')->with('success', 'Logbook telah diminta revisi.');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan.');
    }
}