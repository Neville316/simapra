@extends('layouts.app')

@section('title', 'Dokumen PKL')
@section('header_title', 'Unggah Dokumen Persyaratan PKL')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Form Upload -->
    <div class="card lg:col-span-1">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Unggah Dokumen Baru</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Jenis Dokumen *</label>
                <select name="jenis_dokumen" class="form-input" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach($jenisDokumens as $jenis)
                        <option value="{{ $jenis->value }}">{{ $jenis->label() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">File Dokumen *</label>
                <input type="file" name="file" class="form-input" accept=".pdf,.jpg,.jpeg,.png" required>
                <p class="text-xs text-gray-500 mt-1">Format: PDF, JPG, PNG. Max: 5MB.</p>
            </div>

            <button type="submit" class="btn-primary w-full">Unggah Sekarang</button>
        </form>
    </div>

    <!-- Daftar Dokumen -->
    <div class="card lg:col-span-2">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Dokumen Terunggah</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-sm font-semibold text-gray-600">Jenis Dokumen</th>
                        <th class="py-3 px-4 text-sm font-semibold text-gray-600">Nama File</th>
                        <th class="py-3 px-4 text-sm font-semibold text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokumens as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-sm font-semibold">{{ $item->jenis_dokumen->label() }}</td>
                        <td class="py-3 px-4 text-sm truncate max-w-xs" title="{{ $item->nama_file_asli }}">{{ $item->nama_file_asli }}</td>
                        <td class="py-3 px-4 text-sm">
                            <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="text-blue-500 hover:underline mr-3">Lihat</a>
                            <form action="{{ route('mahasiswa.dokumen.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus dokumen ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500">Anda belum mengunggah dokumen apapun.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection