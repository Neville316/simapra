@extends('layouts.app')

@section('title', 'Mahasiswa Bimbingan')
@section('header_title', 'Daftar Mahasiswa Bimbingan PKL')

@section('content')
<div class="card">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Periode</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswaBimbingan as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">
                        <div class="font-semibold text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                        <div class="text-xs text-gray-500">{{ $item->mahasiswa->nim }} - {{ $item->mahasiswa->program_studi }}</div>
                    </td>
                    <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->periodePkl->nama_periode ?? '-' }}</td>
                    <td class="py-3 px-4 text-sm">
                        <span class="text-xs px-2 py-1 rounded-full {{ $item->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} uppercase">{{ $item->status }}</span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-4 text-center text-gray-500">Belum ada mahasiswa bimbingan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $mahasiswaBimbingan->links() }}
    </div>
</div>
@endsection