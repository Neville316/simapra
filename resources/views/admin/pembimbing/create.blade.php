@extends('layouts.app')

@section('title', 'Tambah Pembimbing')
@section('header_title', 'Tambah Pembimbing Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Form Tambah Pembimbing</h2>
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

        <form action="{{ route('admin.pembimbing.store') }}" method="POST">
            @csrf
            
            <div class="mb-5">
                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-input" placeholder="Masukkan nama lengkap pembimbing..." required autofocus>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Instansi <span class="text-danger">*</span></label>
                    <select name="instansi_id" class="form-input" required>
                        <option value="">-- Pilih Instansi --</option>
                        @foreach($instansi as $i)
                            <option value="{{ $i->id }}">{{ $i->nama_instansi }}</option>
                        @endforeach
                    </select>
                    @error('instansi_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-input" placeholder="Masukkan jabatan...">
                    @error('jabatan')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-input" placeholder="Masukkan NIP...">
                    @error('nip')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-input" placeholder="Masukkan email..." required>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-input" placeholder="Masukkan username..." required>
                    @error('username')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-input" placeholder="Masukkan password..." required>
                    @error('password')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.pembimbing.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Simpan Pembimbing
                </button>
            </div>
        </form>
    </div>
</div>
@endsection