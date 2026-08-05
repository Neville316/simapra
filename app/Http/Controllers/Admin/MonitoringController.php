<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanPkl;
use App\Models\PenempatanPkl;
use App\Models\Logbook;
use App\Models\DokumenPkl;
use App\Models\Penilaian;
use App\Enums\StatusPengajuan;
use App\Enums\StatusLogbook;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index(Request $request)
    {
        // 1. Monitoring Pengajuan
        $pengajuanMenunggu = PengajuanPkl::with(['mahasiswa.user', 'instansi'])
                                ->where('status', StatusPengajuan::MENUNGGU)
                                ->latest()->take(5)->get();

        // 2. Monitoring Penempatan Aktif
        $penempatanAktif = PenempatanPkl::with(['mahasiswa.user', 'instansi'])
                                ->where('status', 'aktif')
                                ->latest()->take(5)->get();

        // 3. Monitoring Logbook (Yang butuh validasi pembimbing)
        $logbookMenunggu = Logbook::with(['mahasiswa.user'])
                                ->where('status', StatusLogbook::MENUNGGU_VALIDASI)
                                ->latest('tanggal')->take(5)->get();

        // 4. Monitoring Dokumen Terunggah
        $dokumenTerbaru = DokumenPkl::with(['mahasiswa.user'])
                                ->latest()->take(5)->get();

        // 5. Monitoring Penilaian (Yang sudah selesai PKL)
        $penilaianTerbaru = Penilaian::with(['mahasiswa.user'])
                                ->latest()->take(5)->get();

        // Statistik Ringkas
        $statistik = [
            'pengajuan_menunggu' => PengajuanPkl::where('status', StatusPengajuan::MENUNGGU)->count(),
            'penempatan_aktif' => PenempatanPkl::where('status', 'aktif')->count(),
            'penempatan_selesai' => PenempatanPkl::where('status', 'selesai')->count(),
            'logbook_menunggu' => Logbook::where('status', StatusLogbook::MENUNGGU_VALIDASI)->count(),
            'logbook_revisi' => Logbook::where('status', StatusLogbook::REVISI)->count(),
            'dokumen_total' => DokumenPkl::count(),

        // 6. Top Mahasiswa Berdasarkan Nilai Tertinggi
        $topNilai = Penilaian::with(['mahasiswa.user', 'penempatan.instansi', 'penempatan.pembimbingInstansi.user'])
                    ->orderBy('nilai_akhir', 'desc')
                    ->take(5)
                    ->get(),
        ];

        return view('admin.monitoring.index', compact(
            'pengajuanMenunggu', 'penempatanAktif', 'logbookMenunggu', 'dokumenTerbaru', 'penilaianTerbaru',
            'statistik', 'topNilai'
        ));
    }
}