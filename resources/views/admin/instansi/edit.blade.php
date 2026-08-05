@extends('layouts.app')

@section('title', 'Edit Instansi')
@section('header_title', 'Edit Data Instansi')

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

   <form action="{{ route('admin.instansi.update', $instansi->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Nama Instansi *</label>
                <input type="text" name="nama_instansi" value="{{ old('nama_instansi', $instansi->nama_instansi) }}" class="shadow border rounded w-full py-2 px-3" required>
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Alamat</label>
                <textarea name="alamat" class="shadow border rounded w-full py-2 px-3">{{ old('alamat', $instansi->alamat) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Kota</label>
                <input type="text" name="kota" value="{{ old('kota', $instansi->kota) }}" class="shadow border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Status Aktif *</label>
                <select name="status_aktif" class="shadow border rounded w-full py-2 px-3">
                    <option value="1" @if(old('status_aktif', $instansi->status_aktif) == 1) selected @endif>Aktif</option>
                    <option value="0" @if(old('status_aktif', $instansi->status_aktif) == 0) selected @endif>Nonaktif</option>
                </select>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.instansi.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection