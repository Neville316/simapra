@extends('layouts.app')

@section('title', 'Edit Instansi')
@section('header_title', 'Edit Data Instansi')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Instansi</h2>
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

        <form action="{{ route('admin.instansi.update', $instansi->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-5">
                <label class="form-label">Nama Instansi <span class="text-danger">*</span></label>
                <input type="text" name="nama_instansi" class="form-input" placeholder="Masukkan nama instansi..." value="{{ old('nama_instansi', $instansi->nama_instansi) }}" required autofocus>
                @error('nama_instansi')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-input" rows="3" placeholder="Masukkan alamat lengkap instansi...">{{ old('alamat', $instansi->alamat) }}</textarea>
                @error('alamat')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Kota</label>
                    <input type="text" name="kota" class="form-input" placeholder="Masukkan kota..." value="{{ old('kota', $instansi->kota) }}">
                    @error('kota')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Provinsi</label>
                    <input type="text" name="provinsi" class="form-input" placeholder="Masukkan provinsi..." value="{{ old('provinsi', $instansi->provinsi) }}">
                    @error('provinsi')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Bidang Usaha</label>
                    <input type="text" name="bidang_usaha" class="form-input" placeholder="Masukkan bidang usaha..." value="{{ old('bidang_usaha', $instansi->bidang_usaha) }}">
                    @error('bidang_usaha')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Status Aktif <span class="text-danger">*</span></label>
                    <select name="status_aktif" class="form-input" required>
                        <option value="1" @if(old('status_aktif', $instansi->status_aktif) == 1) selected @endif>Aktif</option>
                        <option value="0" @if(old('status_aktif', $instansi->status_aktif) == 0) selected @endif>Nonaktif</option>
                    </select>
                    @error('status_aktif')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100 mt-2">
                <a href="{{ route('admin.instansi.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6m10 10v-6h-6M4 20l6-6m10-6l-6 6"/></svg>
                    Update Instansi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection