@extends('layouts.app')

@section('title', 'Penilaian Mahasiswa')
@section('header_title', 'Input Penilaian Mahasiswa Bimbingan')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status PKL</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Nilai Akhir</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswaBimbingan as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-semibold">{{ $item->mahasiswa->user->name }}</td>
                    <td class="py-3 px-4 text-sm">
                        <span class="text-xs px-2 py-1 rounded-full {{ $item->status == 'aktif' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }} uppercase">{{ $item->status }}</span>
                    </td>
                    <td class="py-3 px-4 text-sm">
                        @if($item->penilaian)
                            <span class="font-bold text-lg">{{ $item->penilaian->nilai_akhir }}</span> ({{ $item->penilaian->grade }})
                        @else
                            <span class="text-gray-400">Belum Dinilai</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm text-center">
                        @if($item->penilaian)
                            <span class="text-gray-400 text-xs italic">Sudah Dinilai</span>
                        @else
                            <a href="{{ route('pembimbing.penilaian.create', $item) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-bold py-1.5 px-3 rounded">Beri Penilaian</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-4 text-center text-gray-500">Belum ada mahasiswa bimbingan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection