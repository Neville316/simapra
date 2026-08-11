@extends('layouts.app')

@section('title', 'Tambah Periode PKL')
@section('header_title', 'Tambah Periode PKL Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Form Tambah Periode PKL</h2>
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

        <form action="{{ route('admin.periode.store') }}" method="POST">
            @csrf
            
            <div class="mb-5">
                <label class="form-label">Nama Periode <span class="text-danger">*</span></label>
                <input type="text" name="nama_periode" class="form-input" placeholder="Contoh: Ganjil 2024/2025" required autofocus>
                <p class="text-xs text-gray-400 mt-1">Contoh: Ganjil 2024/2025, Genap 2023/2024, dll.</p>
                @error('nama_periode')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" class="form-input" required>
                    @error('tanggal_mulai')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_selesai" class="form-input" required>
                    @error('tanggal_selesai')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-input" required>
                    <option value="1" selected>Aktif</option>
                    <option value="0">Berakhir</option>
                </select>
                <p class="text-xs text-gray-400 mt-1">* Periode aktif akan tersedia untuk penempatan mahasiswa</p>
                @error('status')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.periode.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Simpan Periode
                </button>
            </div>
        </form>
    </div>
</div>
@endsection