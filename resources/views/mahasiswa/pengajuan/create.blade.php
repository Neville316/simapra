@extends('layouts.app')

@section('title', 'Buat Pengajuan PKL')
@section('header_title', 'Form Pengajuan PKL Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Ajukan PKL</h2>
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

        <form action="{{ route('mahasiswa.pengajuan.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="form-label">Pilih Instansi Tujuan <span class="text-danger">*</span></label>
                <select name="instansi_id" class="form-input" required>
                    <option value="">-- Pilih Instansi --</option>
                    @foreach($instansi as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_instansi }} ({{ $item->kota ?? 'Lokasi' }})</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-400 mt-1.5">🏢 Pilih instansi tempat Anda ingin melaksanakan PKL.</p>
                @error('instansi_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Tanggal Pengajuan <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_pengajuan" class="form-input" value="{{ date('Y-m-d') }}" required>
                @error('tanggal_pengajuan')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-blue-50/80 border border-blue-100 rounded-lg p-4 mb-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <p class="text-sm text-blue-700 font-medium">Informasi</p>
                        <p class="text-xs text-blue-600">Pengajuan akan diverifikasi oleh Admin. Pastikan data yang Anda isi sudah benar.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('mahasiswa.pengajuan.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection