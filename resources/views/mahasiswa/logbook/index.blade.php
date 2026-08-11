@extends('layouts.app')

@section('title', 'Logbook PKL Saya')
@section('header_title', 'Logbook Harian PKL')

@section('content')
<div class="card">
    <div class="card-header flex-wrap gap-3">
        <h2 class="card-title">Riwayat Logbook</h2>
        <a href="{{ route('mahasiswa.logbook.create') }}" class="btn-primary text-sm">
            <svg class="w-4 h-4 mr-1.5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Isi Logbook
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
                    <th>Tanggal</th>
                    <th>Aktivitas</th>
                    <th>Dokumentasi</th>
                    <th class="text-center">Status</th>
                    <th>Catatan Pembimbing</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logbooks as $item)
                <tr>
                    <td class="font-medium text-gray-800 whitespace-nowrap">{{ $item->tanggal->format('d M Y') }}</td>
                    <td class="text-gray-600 max-w-xs truncate" title="{{ $item->aktivitas }}">{{ $item->aktivitas }}</td>
                    <td>
                        @if($item->dokumentasi_path)
                            <a href="{{ Storage::url($item->dokumentasi_path) }}" target="_blank" class="inline-flex items-center text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md hover:bg-blue-100 transition">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Lihat Foto
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">Tidak ada</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <span class="badge {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                    </td>
                    <td class="text-sm">
                        @if($item->catatan_revisi)
                            <span class="text-red-500 italic">"{{ $item->catatan_revisi }}"</span>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-400 py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Anda belum mengisi logbook.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection