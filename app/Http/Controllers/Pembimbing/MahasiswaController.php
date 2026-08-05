<?php

namespace App\Http\Controllers\Pembimbing;

use App\Http\Controllers\Controller;
use App\Models\PenempatanPkl;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $pembimbing = auth()->user()->pembimbingInstansi;

        if (!$pembimbing) {
            return redirect()->route('pembimbing.dashboard')->with('error', 'Profil pembimbing tidak ditemukan.');
        }

        // Ambil semua mahasiswa yang pernah/belum dibimbing oleh pembimbing ini
        $mahasiswaBimbingan = PenempatanPkl::with(['mahasiswa.user', 'instansi', 'periodePkl'])
                                ->where('pembimbing_instansi_id', $pembimbing->id)
                                ->latest()
                                ->paginate(10);

        return view('pembimbing.mahasiswa.index', compact('mahasiswaBimbingan'));
    }
}