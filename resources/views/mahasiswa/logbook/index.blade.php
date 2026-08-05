@extends('layouts.app')

@section('title', 'Logbook PKL Saya')
@section('header_title', 'Logbook Harian PKL')

@section('content')
<div class="card">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-800">Riwayat Logbook</h2>
        <a href="{{ route('mahasiswa.logbook.create') }}" class="btn-primary">+ Isi Logbook</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Aktivitas</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Dokumentasi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Catatan Pembimbing</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logbooks as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm whitespace-nowrap">{{ $item->tanggal->format('d M Y') }}</td>
                    <td class="py-3 px-4 text-sm max-w-xs truncate" title="{{ $item->aktivitas }}">{{ $item->aktivitas }}</td>
                    <td class="py-3 px-4 text-sm">
                        @if($item->dokumentasi_path)
                            <a href="{{ Storage::url($item->dokumentasi_path) }}" target="_blank" class="text-blue-500 hover:underline">Lihat Foto</a>
                        @else
                            <span class="text-gray-400">Tidak ada</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <span class="text-xs px-2 py-1 rounded-full {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-sm text-red-500 italic">
                        {{ $item->catatan_revisi ?? '-' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Anda belum mengisi logbook.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection