@extends('layouts.app')

@section('title', 'Laporan Penempatan PKL')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Export Laporan Penempatan PKL</h2>
        </div>
        
        <form action="{{ route('admin.laporan.export') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Filter Periode -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Periode PKL</label>
                    <select name="periode_pkl_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
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
                    <label class="block text-sm font-medium text-gray-700 mb-2">Instansi</label>
                    <select name="instansi_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
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
                    <label class="block text-sm font-medium text-gray-700 mb-2">Format Export</label>
                    <select name="format" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        <option value="excel" {{ request('format') == 'excel' ? 'selected' : '' }}>Excel (.xlsx)</option>
                        <option value="pdf" {{ request('format') == 'pdf' ? 'selected' : '' }}>PDF (.pdf)</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition duration-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Download Laporan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection