@extends('layouts.app')

@section('title', 'Laporan Penempatan PKL')
@section('header_title', 'Export Laporan Penempatan PKL')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">📊 Export Laporan Penempatan PKL</h2>
            <span class="badge badge-info">Download</span>
        </div>
        
        <form action="{{ route('admin.laporan.export') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
                <!-- Filter Periode -->
                <div>
                    <label class="form-label">Periode PKL</label>
                    <select name="periode_pkl_id" class="form-input">
                        <option value="">Semua Periode</option>
                        @foreach($periodes as $periode)
                            <option value="{{ $periode->id }}" {{ request('periode_pkl_id') == $periode->id ? 'selected' : '' }}>
                                {{ $periode->nama_periode }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Instansi -->
                <div>
                    <label class="form-label">Instansi</label>
                    <select name="instansi_id" class="form-input">
                        <option value="">Semua Instansi</option>
                        @foreach($instansiList as $instansi)
                            <option value="{{ $instansi->id }}" {{ request('instansi_id') == $instansi->id ? 'selected' : '' }}>
                                {{ $instansi->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Pilihan Format Export -->
                <div>
                    <label class="form-label">Format Export <span class="text-danger">*</span></label>
                    <select name="format" class="form-input" required>
                        <option value="excel" {{ request('format') == 'excel' ? 'selected' : '' }}>📗 Excel (.xlsx)</option>
                        <option value="pdf" {{ request('format') == 'pdf' ? 'selected' : '' }}>📄 PDF (.pdf)</option>
                    </select>
                </div>
            </div>

            <div class="bg-blue-50/80 border border-blue-100 rounded-lg p-4 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <p class="text-sm text-blue-700 font-medium">Informasi Export</p>
                        <p class="text-xs text-blue-600">Laporan akan mencakup data mahasiswa, instansi, pembimbing, periode, status, nilai, dan grade.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                    Download Laporan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection