<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PenempatanPkl;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Profil mahasiswa tidak ditemukan.');
        }

        // Cari penempatan yang sudah ada nilainya
        $penempatan = PenempatanPkl::with(['penilaian', 'instansi', 'pembimbingInstansi.user'])
                        ->where('mahasiswa_id', $mahasiswa->id)
                        ->whereHas('penilaian') // Pastikan sudah dinilai pembimbing
                        ->latest()
                        ->first();

        return view('mahasiswa.penilaian.index', compact('penempatan'));
    }
}