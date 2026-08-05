@extends('layouts.app')

@section('title', 'Data Instansi')
@section('header_title', 'Manajemen Data Instansi')

@section('content')
<div class="card">
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin.instansi.index') }}" method="GET">
            <input type="text" name="search" placeholder="Cari nama/kota..." class="form-input inline-block w-64" value="{{ request('search') }}">
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-semibold py-2 px-4 rounded">Cari</button>
        </form>
        <a href="{{ route('admin.instansi.create') }}" class="btn-primary">+ Tambah Instansi</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Nama Instansi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Kota</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Bidang Usaha</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($instansi as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">{{ $item->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->kota }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->bidang_usaha }}</td>
                    <td class="py-3 px-4 text-sm">
                        @if($item->status_aktif)
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Nonaktif</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm text-center">
                        <a href="{{ route('admin.instansi.edit', $item) }}" class="text-blue-500 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.instansi.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
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
        {{ $instansi->links() }}
    </div>
</div>
@endsection