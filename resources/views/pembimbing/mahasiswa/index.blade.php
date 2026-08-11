@extends('layouts.app')

@section('title', 'Mahasiswa Bimbingan')
@section('header_title', 'Daftar Mahasiswa Bimbingan PKL')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Mahasiswa Bimbingan</h2>
        <span class="badge badge-info">{{ $mahasiswaBimbingan->total() }}</span>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Instansi</th>
                    <th>Periode</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswaBimbingan as $item)
                <tr>
                    <td>
                        <div class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                        <div class="text-xs text-gray-400">{{ $item->mahasiswa->nim }} - {{ $item->mahasiswa->program_studi }}</div>
                    </td>
                    <td class="text-gray-600">{{ $item->instansi->nama_instansi }}</td>
                    <td class="text-gray-600">{{ $item->periodePkl->nama_periode ?? '-' }}</td>
                    <td class="text-center">
                        @if($item->status == 'aktif')
                            <span class="badge badge-success uppercase">Aktif</span>
                        @elseif($item->status == 'selesai')
                            <span class="badge badge-gray uppercase">Selesai</span>
                        @else
                            <span class="badge badge-warning uppercase">{{ $item->status }}</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-400 py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Belum ada mahasiswa bimbingan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $mahasiswaBimbingan->links() }}
    </div>
</div>
@endsection