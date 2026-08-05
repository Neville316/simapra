@extends('layouts.app')

@section('title', 'Pengajuan PKL Saya')
@section('header_title', 'Riwayat Pengajuan PKL')

@section('content')
<div class="card">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-800">Riwayat Pengajuan</h2>
        <a href="{{ route('mahasiswa.pengajuan.create') }}" class="btn-primary">+ Ajukan PKL</a>
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
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi Tujuan</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Tanggal Pengajuan</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Catatan Admin</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuans as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->tanggal_pengajuan->format('d M Y') }}</td>
                    <td class="py-3 px-4 text-sm">
                        <span class="text-xs px-2 py-1 rounded-full {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-sm">{{ $item->catatan ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-4 text-center text-gray-500">Anda belum pernah mengajukan PKL.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection