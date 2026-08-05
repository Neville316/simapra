@extends('layouts.app')

@section('title', 'Data Pembimbing')
@section('header_title', 'Manajemen Data Pembimbing Instansi')

@section('content')
<div class="card">
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin.pembimbing.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama..." class="form-input inline-block w-64" value="{{ request('search') }}">
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-semibold py-2 px-4 rounded">Cari</button>
        </form>
        <a href="{{ route('admin.pembimbing.create') }}" class="btn-primary">+ Tambah Pembimbing</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Nama</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Jabatan</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembimbing as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">{{ $item->user->name }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->jabatan }}</td>
                    <td class="py-3 px-4 text-sm text-center">
                        <a href="{{ route('admin.pembimbing.edit', $item) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.pembimbing.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="py-4 text-center text-gray-500">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $pembimbing->links() }}</div>
</div>
@endsection