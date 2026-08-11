@extends('layouts.app')

@section('title', 'Penilaian Mahasiswa')
@section('header_title', 'Input Penilaian Mahasiswa Bimbingan')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="alert alert-success">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="card-header">
        <h2 class="card-title">Daftar Mahasiswa Bimbingan</h2>
        <span class="badge badge-info">{{ $mahasiswaBimbingan->count() }}</span>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th class="text-center">Status PKL</th>
                    <th class="text-center">Nilai Akhir</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswaBimbingan as $item)
                <tr>
                    <td>
                        <div class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                        <div class="text-xs text-gray-400">{{ $item->mahasiswa->nim }} - {{ $item->mahasiswa->program_studi }}</div>
                    </td>
                    <td class="text-center">
                        @if($item->status == 'aktif')
                            <span class="badge badge-success uppercase">Aktif</span>
                        @elseif($item->status == 'selesai')
                            <span class="badge badge-gray uppercase">Selesai</span>
                        @else
                            <span class="badge badge-warning uppercase">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($item->penilaian)
                            <div>
                                <span class="font-bold text-primary text-lg">{{ $item->penilaian->nilai_akhir }}</span>
                                <span class="text-xs text-gray-400">({{ $item->penilaian->grade }})</span>
                            </div>
                        @else
                            <span class="text-gray-400 text-sm">Belum Dinilai</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($item->penilaian)
                            <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-500 bg-gray-100 rounded-md">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Sudah Dinilai
                            </span>
                        @else
                            <a href="{{ route('pembimbing.penilaian.create', $item) }}" class="inline-flex items-center px-4 py-1.5 text-xs font-medium text-white bg-primary rounded-md hover:bg-primary-hover transition shadow-sm">
                                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                Beri Penilaian
                            </a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-400 py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Belum ada mahasiswa bimbingan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection