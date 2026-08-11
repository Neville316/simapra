@extends('layouts.app')

@section('title', 'Pengajuan PKL Saya')
@section('header_title', 'Riwayat Pengajuan PKL')

@section('content')
<div class="card">
    <div class="card-header flex-wrap gap-3">
        <h2 class="card-title">Riwayat Pengajuan</h2>
        <a href="{{ route('mahasiswa.pengajuan.create') }}" class="btn-primary text-sm">
            <svg class="w-4 h-4 mr-1.5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Ajukan PKL
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
    @endif

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Instansi Tujuan</th>
                    <th>Tanggal Pengajuan</th>
                    <th class="text-center">Status</th>
                    <th>Catatan Admin</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuans as $item)
                <tr>
                    <td class="font-medium text-gray-800">{{ $item->instansi->nama_instansi }}</td>
                    <td class="text-gray-600">{{ $item->tanggal_pengajuan->format('d M Y') }}</td>
                    <td class="text-center">
                        <span class="badge {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                    </td>
                    <td class="text-gray-600">
                        @if($item->catatan)
                            <span class="text-sm italic text-red-500">"{{ $item->catatan }}"</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-400 py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Anda belum pernah mengajukan PKL.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection