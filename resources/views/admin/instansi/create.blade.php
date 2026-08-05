@extends('layouts.app')

@section('title', 'Tambah Instansi')
@section('header_title', 'Tambah Instansi Baru')

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

    <form action="{{ route('admin.instansi.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Nama Instansi *</label>
                <input type="text" name="nama_instansi" class="form-input" required>
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Alamat</label>
                <textarea name="alamat" class="shadow border rounded w-full py-2 px-3"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Kota</label>
                <input type="text" name="kota" class="shadow border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Provinsi</label>
                <input type="text" name="provinsi" class="shadow border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Bidang Usaha</label>
                <input type="text" name="bidang_usaha" class="shadow border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Status Aktif *</label>
                <select name="status_aktif" class="shadow border rounded w-full py-2 px-3">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.instansi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection