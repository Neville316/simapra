<?php

namespace App\Http\Controllers\Pembimbing;

use App\Http\Controllers\Controller;
use App\Models\PenempatanPkl;
use App\Models\Penilaian;
use App\Notifications\SimapraNotification;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $pembimbing = auth()->user()->pembimbingInstansi;

        if (!$pembimbing) {
            return redirect()->route('pembimbing.dashboard')->with('error', 'Profil pembimbing tidak ditemukan.');
        }

        // Ambil mahasiswa bimbingan yang aktif
        $mahasiswaBimbingan = PenempatanPkl::with(['mahasiswa.user', 'penilaian'])
                                ->where('pembimbing_instansi_id', $pembimbing->id)
                                ->latest()
                                ->get();

        return view('pembimbing.penilaian.index', compact('mahasiswaBimbingan'));
    }

    public function create(PenempatanPkl $penempatan)
    {
        // Guard: Pastikan pembimbing hanya menilai mahasiswanya sendiri
        $pembimbing = auth()->user()->pembimbingInstansi;
        if ($penempatan->pembimbing_instansi_id != $pembimbing->id) {
            abort(403, 'Anda tidak berhak menilai mahasiswa ini.');
        }

        // Jika sudah dinilai, redirect kembali
        if ($penempatan->penilaian) {
            return redirect()->route('pembimbing.penilaian.index')->with('error', 'Mahasiswa ini sudah diberi penilaian.');
        }

        return view('pembimbing.penilaian.create', compact('penempatan'));
    }

    public function store(Request $request, PenempatanPkl $penempatan)
    {
        $pembimbing = auth()->user()->pembimbingInstansi;
        if ($penempatan->pembimbing_instansi_id != $pembimbing->id) {
            abort(403, 'Anda tidak berhak menilai mahasiswa ini.');
        }

        $validated = $request->validate([
            'nilai_kedisiplinan' => 'required|integer|min:0|max:100',
            'nilai_kemampuan_kerja' => 'required|integer|min:0|max:100',
            'nilai_komunikasi' => 'required|integer|min:0|max:100',
            'nilai_hasil_kerja' => 'required|integer|min:0|max:100',
            'evaluasi' => 'nullable|string',
            'rekomendasi' => 'required|in:Diterima,Dipertimbangkan,Tidak Diterima',
        ]);

        // Hitung Nilai Akhir (Rata-rata)
        $nilaiAkhir = round((
            $validated['nilai_kedisiplinan'] + 
            $validated['nilai_kemampuan_kerja'] + 
            $validated['nilai_komunikasi'] + 
            $validated['nilai_hasil_kerja']
        ) / 4);

        // Tentukan Grade
        $grade = 'E';
        if ($nilaiAkhir >= 85) $grade = 'A';
        elseif ($nilaiAkhir >= 75) $grade = 'B';
        elseif ($nilaiAkhir >= 60) $grade = 'C';
        elseif ($nilaiAkhir >= 50) $grade = 'D';

        Penilaian::create([
            'penempatan_id' => $penempatan->id,
            'mahasiswa_id' => $penempatan->mahasiswa_id,
            'pembimbing_instansi_id' => $pembimbing->id,
            'nilai_kedisiplinan' => $validated['nilai_kedisiplinan'],
            'nilai_kemampuan_kerja' => $validated['nilai_kemampuan_kerja'],
            'nilai_komunikasi' => $validated['nilai_komunikasi'],
            'nilai_hasil_kerja' => $validated['nilai_hasil_kerja'],
            'nilai_akhir' => $nilaiAkhir,
            'grade' => $grade,
            'evaluasi' => $validated['evaluasi'],
            'rekomendasi' => $validated['rekomendasi'],
        ]);

        // Update Status Penempatan menjadi Selesai
        $penempatan->update(['status' => 'selesai']);

        $penempatan->mahasiswa->user->notify(new SimapraNotification(
            'Nilai PKL Diterbitkan',
            'Pembimbing telah memberikan penilaian akhir. Status PKL Anda: Selesai.',
            'success'
        ));
        return redirect()->route('pembimbing.penilaian.index')->with('success', 'Penilaian berhasil disimpan. Status PKL mahasiswa telah selesai.');
    }
}