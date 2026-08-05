<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstansiRequest;
use App\Http\Requests\UpdateInstansiRequest;
use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index(Request $request)
    {
        $query = Instansi::query();

        // Fitur Search
        if ($request->filled('search')) {
            $query->where('nama_instansi', 'like', '%' . $request->search . '%')
                  ->orWhere('kota', 'like', '%' . $request->search . '%');
        }

        $instansi = $query->latest()->paginate(10); // Pagination 10 data per halaman

        return view('admin.instansi.index', compact('instansi'));
    }

    public function create()
    {
        return view('admin.instansi.create');
    }

    public function store(StoreInstansiRequest $request)
    {
        Instansi::create($request->validated());
        return redirect()->route('admin.instansi.index')->with('success', 'Data instansi berhasil ditambahkan.');
    }

    public function edit(Instansi $instansi)
    {
        return view('admin.instansi.edit', compact('instansi'));
    }

    public function update(UpdateInstansiRequest $request, Instansi $instansi)
    {
        $instansi->update($request->validated());
        return redirect()->route('admin.instansi.index')->with('success', 'Data instansi berhasil diperbarui.');
    }

    public function destroy(Instansi $instansi)
    {
        $instansi->delete(); // Soft Delete
        return redirect()->route('admin.instansi.index')->with('success', 'Data instansi berhasil dihapus.');
    }
}