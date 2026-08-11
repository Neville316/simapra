@extends('layouts.app')

@section('title', 'Form Penempatan PKL')
@section('header_title', 'Tempatkan Mahasiswa: ' . $pengajuan->mahasiswa->user->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Form Penempatan PKL</h2>
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

        <!-- Informasi Mahasiswa -->
        <div class="bg-gray-50/80 rounded-lg p-4 mb-6 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Mahasiswa</p>
                    <p class="font-semibold text-gray-800">{{ $pengajuan->mahasiswa->user->name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Instansi Tujuan</p>
                    <p class="font-semibold text-gray-800">{{ $pengajuan->instansi->nama_instansi }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.penempatan.store', $pengajuan) }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="mb-5 md:mb-0">
                    <label class="form-label">Pembimbing Instansi <span class="text-danger">*</span></label>
                    <select name="pembimbing_instansi_id" class="form-input" required>
                        <option value="">-- Pilih Pembimbing --</option>
                        @foreach($pembimbing as $p)
                            <option value="{{ $p->id }}">{{ $p->user->name }} ({{ $p->jabatan ?? 'Pembimbing' }})</option>
                        @endforeach
                    </select>
                    @error('pembimbing_instansi_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 md:mb-0">
                    <label class="form-label">Periode PKL <span class="text-danger">*</span></label>
                    <select name="periode_pkl_id" class="form-input" required>
                        <option value="">-- Pilih Periode --</option>
                        @foreach($periode as $pr)
                            <option value="{{ $pr->id }}">{{ $pr->nama_periode }}</option>
                        @endforeach
                    </select>
                    @error('periode_pkl_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
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
                <label class="form-label">Fasilitas yang Diberikan</label>
                <p class="text-xs text-gray-400 mb-2">* Centang fasilitas yang tersedia untuk mahasiswa</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach($fasilitas as $f)
                        <label class="flex items-center gap-2 p-3 bg-gray-50/80 rounded-lg border border-gray-100 hover:bg-gray-100 transition cursor-pointer">
                            <input type="checkbox" name="fasilitas_id[]" value="{{ $f->id }}" class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary/30">
                            <span class="text-sm text-gray-700">{{ $f->nama_fasilitas }}</span>
                        </label>
                    @endforeach
                </div>
                @error('fasilitas_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('admin.penempatan.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Simpan Penempatan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection