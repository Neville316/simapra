<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DokumenPkl;
use App\Enums\JenisDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Profil mahasiswa tidak ditemukan.');
        }

        // Ambil semua dokumen milik mahasiswa ini
        $dokumens = DokumenPkl::where('mahasiswa_id', $mahasiswa->id)->latest()->get();

        // Daftar jenis dokumen yang bisa diupload (dari Enum)
        $jenisDokumens = JenisDokumen::cases();

        return view('mahasiswa.dokumen.index', compact('dokumens', 'jenisDokumens'));
    }

    public function store(Request $request)
    {
        $mahasiswa = auth()->user()->mahasiswa;

        $validated = $request->validate([
            'jenis_dokumen' => 'required|in:' . implode(',', array_column(JenisDokumen::cases(), 'value')),
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120', // Max 5MB
        ]);

        // Cek jika jenis dokumen sudah ada, hapus yang lama (opsional, atau bisa diabaikan jika boleh banyak)
        $existing = DokumenPkl::where('mahasiswa_id', $mahasiswa->id)
                            ->where('jenis_dokumen', $validated['jenis_dokumen'])
                            ->first();
        
        if ($existing) {
            Storage::disk('public')->delete($existing->file_path);
            $existing->delete();
        }

        $file = $request->file('file');
        $path = $file->store('dokumen_pkl', 'public');

        DokumenPkl::create([
            'mahasiswa_id' => $mahasiswa->id,
            'jenis_dokumen' => $validated['jenis_dokumen'],
            'file_path' => $path,
            'nama_file_asli' => $file->getClientOriginalName(),
        ]);

        return redirect()->route('mahasiswa.dokumen.index')->with('success', 'Dokumen berhasil diunggah.');
    }

    public function destroy(DokumenPkl $dokumen)
    {
        // Pastikan mahasiswa hanya bisa menghapus dokumennya sendiri
        if ($dokumen->mahasiswa_id != auth()->user()->mahasiswa->id) {
            abort(403);
        }

        Storage::disk('public')->delete($dokumen->file_path);
        $dokumen->delete();

        return redirect()->route('mahasiswa.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}