@extends('layouts.app')

@section('title', 'Edit Mahasiswa')
@section('header_title', 'Edit Data Mahasiswa')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Mahasiswa</h2>
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

        <form action="{{ route('admin.mahasiswa.update', $mahasiswa) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-input" placeholder="Masukkan nama lengkap mahasiswa..." value="{{ old('name', $mahasiswa->user->name) }}" required autofocus>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">NIM <span class="text-danger">*</span></label>
                    <input type="text" name="nim" class="form-input" placeholder="Masukkan NIM..." value="{{ old('nim', $mahasiswa->nim) }}" required>
                    @error('nim')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Angkatan</label>
                    <input type="text" name="angkatan" class="form-input" placeholder="Contoh: 2023" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
                    @error('angkatan')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label">Program Studi</label>
                <input type="text" name="program_studi" class="form-input" placeholder="Masukkan program studi..." value="{{ old('program_studi', $mahasiswa->program_studi) }}">
                @error('program_studi')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-input" placeholder="Masukkan username..." value="{{ old('username', $mahasiswa->user->username) }}" required>
                    @error('username')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-input" placeholder="Masukkan email..." value="{{ old('email', $mahasiswa->user->email) }}" required>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="Kosongkan jika tidak diubah">
                <p class="text-xs text-gray-400 mt-1">* Kosongkan jika tidak ingin mengubah password</p>
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6m10 10v-6h-6M4 20l6-6m10-6l-6 6"/></svg>
                    Update Mahasiswa
                </button>
            </div>
        </form>
    </div>
</div>
@endsection