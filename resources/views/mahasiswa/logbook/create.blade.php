@extends('layouts.app')

@section('title', 'Isi Logbook Harian')
@section('header_title', 'Form Isi Logbook PKL')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Isi Logbook Harian</h2>
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

        <form action="{{ route('mahasiswa.logbook.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="form-label">Tanggal Kegiatan <span class="text-danger">*</span></label>
                <input type="date" name="tanggal" class="form-input" value="{{ date('Y-m-d') }}" required>
                @error('tanggal')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Uraian Aktivitas <span class="text-danger">*</span></label>
                <textarea name="aktivitas" rows="5" class="form-input" required placeholder="Jelaskan pekerjaan yang dilakukan hari ini..."></textarea>
                <p class="text-xs text-gray-400 mt-1.5">✏️ Deskripsikan secara detail kegiatan yang Anda lakukan hari ini.</p>
                @error('aktivitas')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Dokumentasi Foto</label>
                <div class="relative">
                    <input type="file" name="dokumentasi" class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer" accept="image/*">
                </div>
                <p class="text-xs text-gray-400 mt-1.5">📸 Format: JPG, PNG. Max: 2MB. (Opsional)</p>
                @error('dokumentasi')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('mahasiswa.logbook.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Simpan Logbook
                </button>
            </div>
        </form>
    </div>
</div>
@endsection