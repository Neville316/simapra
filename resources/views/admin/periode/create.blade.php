@extends('layouts.app')

@section('title', 'Tambah Periode PKL')
@section('header_title', 'Tambah Periode PKL Baru')

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.periode.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Nama Periode * (Contoh: Ganjil 2024/2025)</label>
                <input type="text" name="nama_periode" class="shadow border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Tanggal Mulai *</label>
                <input type="date" name="tanggal_mulai" class="shadow border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Tanggal Selesai *</label>
                <input type="date" name="tanggal_selesai" class="shadow border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Status *</label>
                <select name="status" class="shadow border rounded w-full py-2 px-3">
                    <option value="1">Aktif</option>
                    <option value="0">Berakhir</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.periode.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection