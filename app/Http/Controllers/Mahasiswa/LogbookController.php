<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use App\Enums\StatusLogbook;
use Illuminate\Http\Request;
use App\Notifications\SimapraNotification;
use Illuminate\Support\Facades\Storage;

class LogbookController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Profil mahasiswa tidak ditemukan.');
        }

        $penempatan = $mahasiswa->penempatanPkl()->where('status', 'aktif')->first();

        if (!$penempatan) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Anda belum memiliki penempatan PKL yang aktif.');
        }

        // Eager loading untuk mencegah N+1
        $logbooks = Logbook::where('penempatan_id', $penempatan->id)
                        ->latest('tanggal')
                        ->get();

        return view('mahasiswa.logbook.index', compact('logbooks', 'penempatan'));
    }

    public function create()
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $penempatan = $mahasiswa->penempatanPkl()->where('status', 'aktif')->first();

        if (!$penempatan) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Anda belum memiliki penempatan PKL yang aktif.');
        }

        return view('mahasiswa.logbook.create', compact('penempatan'));
    }

    public function store(Request $request)
    {
        $mahasiswa = auth()->user()->mahasiswa;
        $penempatan = $mahasiswa->penempatanPkl()->where('status', 'aktif')->first();

        if (!$penempatan) {
            return redirect()->route('mahasiswa.dashboard')->with('error', 'Anda belum memiliki penempatan PKL yang aktif.');
        }

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'aktivitas' => 'required|string',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        $path = null;
        if ($request->hasFile('dokumentasi')) {
            // Simpan di storage/app/public/logbooks
            $path = $request->file('dokumentasi')->store('logbooks', 'public');
        }

        Logbook::create([
            'penempatan_id' => $penempatan->id,
            'mahasiswa_id' => $mahasiswa->id,
            'tanggal' => $validated['tanggal'],
            'aktivitas' => $validated['aktivitas'],
            'dokumentasi_path' => $path,
            'status' => StatusLogbook::MENUNGGU_VALIDASI,
        ]);

        // Di akhir fungsi store()
        $penempatan->pembimbingInstansi->user->notify(new SimapraNotification(
            'Logbook Baru Menunggu Validasi',
            $mahasiswa->user->name . ' mengirim logbook harian baru.',
            'warning'
        ));

        return redirect()->route('mahasiswa.logbook.index')->with('success', 'Logbook harian berhasil ditambahkan.');
    }
}