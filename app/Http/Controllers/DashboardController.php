<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Instansi;
use App\Models\PembimbingInstansi;
use App\Models\PengajuanPkl;
use App\Models\PenempatanPkl;
use App\Models\Logbook;
use App\Enums\StatusPengajuan;
use App\Enums\StatusLogbook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $totalMahasiswa = Mahasiswa::count();
        $mahasiswaAktif = PenempatanPkl::where('status', 'aktif')->count();
        $totalInstansi = Instansi::where('status_aktif', 1)->count();
        $totalPembimbing = PembimbingInstansi::count();
        $pengajuanMenunggu = PengajuanPkl::where('status', StatusPengajuan::MENUNGGU)->count();

        $pengajuanTerbaru = PengajuanPkl::with(['mahasiswa.user', 'instansi'])->latest()->take(5)->get();
        $penempatanAktif = PenempatanPkl::with(['mahasiswa.user', 'instansi'])->where('status', 'aktif')->latest()->take(5)->get();

        // DATA GRAFIK ADMIN (Pie Chart Status Penempatan)
        $aktif = PenempatanPkl::where('status', 'aktif')->count();
        $selesai = PenempatanPkl::where('status', 'selesai')->count();
        $batal = PenempatanPkl::where('status', 'dibatalkan')->count();

        return view('admin.dashboard', compact(
            'totalMahasiswa', 'mahasiswaAktif', 'totalInstansi', 'totalPembimbing', 
            'pengajuanMenunggu', 'pengajuanTerbaru', 'penempatanAktif',
            'aktif', 'selesai', 'batal'
        ));
    }

    public function mahasiswa()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('logout')->with('error', 'Profil mahasiswa tidak ditemukan.');
        }

        $pengajuan = PengajuanPkl::where('mahasiswa_id', $mahasiswa->id)->latest()->first();
        $penempatan = PenempatanPkl::with(['instansi', 'pembimbingInstansi.user', 'periodePkl'])
                        ->where('mahasiswa_id', $mahasiswa->id)
                        ->where('status', 'aktif')
                        ->first();

        // DATA GRAFIK MAHASISWA (Bar Chart Progres Logbook)
        $logTervalidasi = Logbook::where('mahasiswa_id', $mahasiswa->id)->where('status', StatusLogbook::TERVALIDASI)->count();
        $logMenunggu = Logbook::where('mahasiswa_id', $mahasiswa->id)->where('status', StatusLogbook::MENUNGGU_VALIDASI)->count();
        $logRevisi = Logbook::where('mahasiswa_id', $mahasiswa->id)->where('status', StatusLogbook::REVISI)->count();

        return view('mahasiswa.dashboard', compact(
            'pengajuan', 'penempatan',
            'logTervalidasi', 'logMenunggu', 'logRevisi'
        ));
    }

    public function pembimbing()
    {
        $user = Auth::user();
        $pembimbing = $user->pembimbingInstansi;

        if (!$pembimbing) {
            return redirect()->route('logout')->with('error', 'Profil pembimbing tidak ditemukan.');
        }

        $totalMahasiswa = PenempatanPkl::where('pembimbing_instansi_id', $pembimbing->id)->count();
        $mahasiswaBimbingan = PenempatanPkl::with(['mahasiswa.user', 'instansi'])
                                ->where('pembimbing_instansi_id', $pembimbing->id)
                                ->latest()->take(5)->get();

        // DATA GRAFIK PEMBIMBING (Bar Chart Mahasiswa Aktif vs Selesai)
        $mhsAktif = PenempatanPkl::where('pembimbing_instansi_id', $pembimbing->id)->where('status', 'aktif')->count();
        $mhsSelesai = PenempatanPkl::where('pembimbing_instansi_id', $pembimbing->id)->where('status', 'selesai')->count();

        return view('pembimbing.dashboard', compact(
            'totalMahasiswa', 'mahasiswaBimbingan',
            'mhsAktif', 'mhsSelesai'
        ));
    }
}