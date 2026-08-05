@extends('layouts.app')

@section('title', 'Edit Fasilitas')
@section('header_title', 'Edit Data Fasilitas')

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

    <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Nama Fasilitas *</label>
            <input type="text" name="nama_fasilitas" value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" class="shadow border rounded w-full py-2 px-3" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Deskripsi</label>
            <textarea name="deskripsi" class="shadow border rounded w-full py-2 px-3" rows="4">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.fasilitas.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection