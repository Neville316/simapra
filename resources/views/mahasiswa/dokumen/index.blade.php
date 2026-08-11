@extends('layouts.app')

@section('title', 'Dokumen PKL')
@section('header_title', 'Unggah Dokumen Persyaratan PKL')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Form Upload -->
    <div class="card lg:col-span-1">
        <div class="card-header">
            <h2 class="card-title">Unggah Dokumen Baru</h2>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mahasiswa.dokumen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="form-label">Jenis Dokumen <span class="text-danger">*</span></label>
                <select name="jenis_dokumen" class="form-input" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach($jenisDokumens as $jenis)
                        <option value="{{ $jenis->value }}">{{ $jenis->label() }}</option>
                    @endforeach
                </select>
                @error('jenis_dokumen')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">File Dokumen <span class="text-danger">*</span></label>
                <div class="relative">
                    <input type="file" name="file" class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 cursor-pointer" accept=".pdf,.jpg,.jpeg,.png" required>
                </div>
                <p class="text-xs text-gray-400 mt-1.5">📄 Format: PDF, JPG, PNG. Max: 5MB.</p>
                @error('file')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary w-full">
                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                Unggah Sekarang
            </button>
        </form>
    </div>

    <!-- Daftar Dokumen -->
    <div class="card lg:col-span-2">
        <div class="card-header">
            <h2 class="card-title">Dokumen Terunggah</h2>
            <span class="badge badge-info">{{ $dokumens->count() }}</span>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Jenis Dokumen</th>
                        <th>Nama File</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokumens as $item)
                    <tr>
                        <td class="font-medium text-gray-800">{{ $item->jenis_dokumen->label() }}</td>
                        <td class="text-gray-600 max-w-xs truncate" title="{{ $item->nama_file_asli }}">{{ $item->nama_file_asli }}</td>
                        <td class="text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <a href="{{ Storage::url($item->file_path) }}" target="_blank" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-50 rounded-md hover:bg-blue-100 transition">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Lihat
                                </a>
                                <form action="{{ route('mahasiswa.dokumen.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-md hover:bg-red-100 transition">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-400 py-8">
                            <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            Anda belum mengunggah dokumen apapun.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection