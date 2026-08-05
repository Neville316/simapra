<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodeRequest;
use App\Models\PeriodePkl;
use Illuminate\Http\Request;

class PeriodePklController extends Controller
{
    public function index(Request $request)
    {
        $periode = PeriodePkl::latest()->paginate(10);
        return view('admin.periode.index', compact('periode'));
    }

    public function create()
    {
        return view('admin.periode.create');
    }

    public function store(StorePeriodeRequest $request)
    {
        PeriodePkl::create($request->validated());
        return redirect()->route('admin.periode.index')->with('success', 'Periode PKL berhasil ditambahkan.');
    }

    public function edit(PeriodePkl $periode)
    {
        return view('admin.periode.edit', compact('periode'));
    }

    public function update(StorePeriodeRequest $request, PeriodePkl $periode)
    {
        $periode->update($request->validated());
        return redirect()->route('admin.periode.index')->with('success', 'Periode PKL berhasil diperbarui.');
    }

    public function destroy(PeriodePkl $periode)
    {
        $periode->delete();
        return redirect()->route('admin.periode.index')->with('success', 'Periode PKL berhasil dihapus.');
    }
}