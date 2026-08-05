@extends('layouts.app')

@section('title', 'Isi Logbook Harian')
@section('header_title', 'Form Isi Logbook PKL')

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.logbook.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Tanggal Kegiatan *</label>
            <input type="date" name="tanggal" class="form-input" value="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Uraian Aktivitas *</label>
            <textarea name="aktivitas" rows="5" class="form-input" required placeholder="Jelaskan pekerjaan yang dilakukan hari ini..."></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Dokumentasi Foto (Opsional)</label>
            <input type="file" name="dokumentasi" class="form-input" accept="image/*">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG. Max: 2MB.</p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('mahasiswa.logbook.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="btn-primary">Simpan Logbook</button>
        </div>
    </form>
</div>
@endsection