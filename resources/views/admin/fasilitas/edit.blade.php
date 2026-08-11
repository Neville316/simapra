@extends('layouts.app')

@section('title', 'Edit Fasilitas')
@section('header_title', 'Edit Data Fasilitas')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Fasilitas</h2>
            <span class="text-xs text-gray-400">* wajib diisi</span>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.fasilitas.update', $fasilitas->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label class="form-label">Nama Fasilitas <span class="text-danger">*</span></label>
                <input type="text" name="nama_fasilitas" class="form-input" placeholder="Masukkan nama fasilitas..." value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" required autofocus>
                @error('nama_fasilitas')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-input" rows="4" placeholder="Masukkan deskripsi fasilitas (opsional)...">{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.fasilitas.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6m10 10v-6h-6M4 20l6-6m10-6l-6 6"/></svg>
                    Update Fasilitas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection