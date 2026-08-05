@extends('layouts.app')

@section('title', 'Data Fasilitas')
@section('header_title', 'Manajemen Data Fasilitas')

@section('content')
<div class="card">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-800">Daftar Fasilitas</h2>
        <a href="{{ route('admin.fasilitas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">+ Tambah Fasilitas</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Nama Fasilitas</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Deskripsi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fasilitas as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">{{ $item->nama_fasilitas }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->deskripsi }}</td>
                    <td class="py-3 px-4 text-sm text-center">
                        <a href="{{ route('admin.fasilitas.edit', $item) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.fasilitas.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $fasilitas->links() }}
    </div>
</div>
@endsection