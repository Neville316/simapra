@extends('layouts.app')

@section('title', 'Form Penempatan PKL')
@section('header_title', 'Tempatkan Mahasiswa: ' . $pengajuan->mahasiswa->user->name)

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.penempatan.store', $pengajuan) }}" method="POST">
        @csrf
        
        <div class="mb-4 p-4 bg-gray-50 rounded">
            <p class="text-sm text-gray-600">Mahasiswa: <strong>{{ $pengajuan->mahasiswa->user->name }}</strong></p>
            <p class="text-sm text-gray-600">Instansi Tujuan: <strong>{{ $pengajuan->instansi->nama_instansi }}</strong></p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Pembimbing Instansi *</label>
                <select name="pembimbing_instansi_id" class="form-input" required>
                    <option value="">-- Pilih Pembimbing --</option>
                    @foreach($pembimbing as $p)
                        <option value="{{ $p->id }}">{{ $p->user->name }} ({{ $p->jabatan }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Periode PKL *</label>
                <select name="periode_pkl_id" class="form-input" required>
                    <option value="">-- Pilih Periode --</option>
                    @foreach($periode as $pr)
                        <option value="{{ $pr->id }}">{{ $pr->nama_periode }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Tanggal Mulai *</label>
                <input type="date" name="tanggal_mulai" class="form-input" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Tanggal Selesai *</label>
                <input type="date" name="tanggal_selesai" class="form-input" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Fasilitas yang Diberikan (Opsional)</label>
            <div class="grid grid-cols-3 gap-2 mt-2">
                @foreach($fasilitas as $f)
                <label class="flex items-center space-x-2 bg-gray-50 p-2 rounded">
                    <input type="checkbox" name="fasilitas_id[]" value="{{ $f->id }}" class="rounded">
                    <span class="text-sm">{{ $f->nama_fasilitas }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.penempatan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="btn-primary">Simpan Penempatan</button>
        </div>
    </form>
</div>
@endsection