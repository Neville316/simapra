@extends('layouts.app')

@section('title', 'Buat Pengajuan PKL')
@section('header_title', 'Form Pengajuan PKL Baru')

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.pengajuan.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Pilih Instansi Tujuan *</label>
            <select name="instansi_id" class="form-input" required>
                <option value="">-- Pilih Instansi --</option>
                @foreach($instansi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_instansi }} ({{ $item->kota }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Tanggal Pengajuan *</label>
            <input type="date" name="tanggal_pengajuan" class="form-input" value="{{ date('Y-m-d') }}" required>
        </div>
        
        <div class="flex justify-end">
            <a href="{{ route('mahasiswa.pengajuan.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="btn-primary">Kirim Pengajuan</button>
        </div>
    </form>
</div>
@endsection