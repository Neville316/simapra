@extends('layouts.app')

@section('title', 'Penempatan PKL')
@section('header_title', 'Manajemen Penempatan Mahasiswa')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <h2 class="text-lg font-bold text-gray-800 mb-4">Mahasiswa Menunggu Penempatan</h2>
    <div class="overflow-x-auto mb-8">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuans as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-semibold">{{ $item->mahasiswa->user->name }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm text-center">
                        <a href="{{ route('admin.penempatan.create', $item) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1.5 px-3 rounded">Buat Penempatan</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="py-4 text-center text-gray-500">Tidak ada mahasiswa menunggu penempatan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <h2 class="text-lg font-bold text-gray-800 mb-4 mt-8">Riwayat Penempatan Aktif</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Pembimbing</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($penempatans as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-semibold">{{ $item->mahasiswa->user->name }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->pembimbingInstansi->user->name ?? '-' }}</td>
                    <td class="py-3 px-4 text-sm">
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full uppercase">{{ $item->status }}</span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-4 text-center text-gray-500">Belum ada penempatan aktif.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $penempatans->links() }}</div>
</div>
@endsection