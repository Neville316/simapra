@extends('layouts.app')

@section('title', 'Edit Pembimbing')
@section('header_title', 'Edit Data Pembimbing')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Pembimbing</h2>
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

        <form action="{{ route('admin.pembimbing.update', $pembimbing) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-input" placeholder="Masukkan nama lengkap pembimbing..." value="{{ old('name', $pembimbing->user->name) }}" required autofocus>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Instansi <span class="text-danger">*</span></label>
                    <select name="instansi_id" class="form-input" required>
                        @foreach($instansi as $i)
                            <option value="{{ $i->id }}" @if(old('instansi_id', $pembimbing->instansi_id) == $i->id) selected @endif>{{ $i->nama_instansi }}</option>
                        @endforeach
                    </select>
                    @error('instansi_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-input" placeholder="Masukkan jabatan..." value="{{ old('jabatan', $pembimbing->jabatan) }}">
                    @error('jabatan')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-input" placeholder="Masukkan NIP..." value="{{ old('nip', $pembimbing->nip) }}">
                    @error('nip')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-input" placeholder="Masukkan email..." value="{{ old('email', $pembimbing->user->email) }}" required>
                    @error('email')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-input" placeholder="Masukkan username..." value="{{ old('username', $pembimbing->user->username) }}" required>
                    @error('username')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Kosongkan jika tidak diubah">
                    <p class="text-xs text-gray-400 mt-1">* Kosongkan jika tidak ingin mengubah password</p>
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
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6m10 10v-6h-6M4 20l6-6m10-6l-6 6"/></svg>
                    Update Pembimbing
                </button>
            </div>
        </form>
    </div>
</div>
@endsection