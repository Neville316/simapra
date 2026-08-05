@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('header_title', 'Manajemen Data Mahasiswa')

@section('content')
<div class="card">
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin.mahasiswa.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama/NIM..." class="form-input inline-block w-64" value="{{ request('search') }}">
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-semibold py-2 px-4 rounded">Cari</button>
        </form>
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn-primary">+ Tambah Mahasiswa</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Nama</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">NIM</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Prodi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Email</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">{{ $item->user->name }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->nim }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->program_studi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->user->email }}</td>
                    <td class="py-3 px-4 text-sm text-center">
                        <a href="{{ route('admin.mahasiswa.edit', $item) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.mahasiswa.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="py-4 text-center text-gray-500">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $mahasiswa->links() }}</div>
</div>
@endsection