@extends('layouts.app')

@section('title', 'Nilai PKL Saya')
@section('header_title', 'Hasil Penilaian PKL')

@section('content')
<div class="card">
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if($penempatan)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Nilai Akhir & Grade -->
            <div class="bg-blue-50 rounded-lg p-6 text-center border border-blue-100">
                <p class="text-sm font-semibold text-blue-600 uppercase">Nilai Akhir</p>
                <p class="text-5xl font-bold text-blue-800 mt-2">{{ $penempatan->penilaian->nilai_akhir }}</p>
                <p class="text-2xl font-bold text-blue-500 mt-1">({{ $penempatan->penilaian->grade }})</p>
            </div>

            <!-- Info PKL -->
            <div class="col-span-2 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs text-gray-500 uppercase">Instansi</p>
                    <p class="font-bold text-gray-800">{{ $penempatan->instansi->nama_instansi }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Pembimbing</p>
                    <p class="font-bold text-gray-800">{{ $penempatan->pembimbingInstansi->user->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Status PKL</p>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full uppercase font-bold">Selesai</span>
                </div>
                <div>
                    <p class="text-xs text-gray-500 uppercase">Rekomendasi Rekrutmen</p>
                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full uppercase font-bold">{{ $penempatan->penilaian->rekomendasi }}</span>
                </div>
            </div>
        </div>

        <!-- Rincian Nilai -->
        <h2 class="text-lg font-bold text-gray-800 mb-4 mt-8">Rincian Komponen Nilai</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-50 p-4 rounded text-center">
                <p class="text-xs text-gray-500">Kedisiplinan</p>
                <p class="text-2xl font-bold text-gray-800">{{ $penempatan->penilaian->nilai_kedisiplinan }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded text-center">
                <p class="text-xs text-gray-500">Kemampuan Kerja</p>
                <p class="text-2xl font-bold text-gray-800">{{ $penempatan->penilaian->nilai_kemampuan_kerja }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded text-center">
                <p class="text-xs text-gray-500">Komunikasi</p>
                <p class="text-2xl font-bold text-gray-800">{{ $penempatan->penilaian->nilai_komunikasi }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded text-center">
                <p class="text-xs text-gray-500">Hasil Kerja</p>
                <p class="text-2xl font-bold text-gray-800">{{ $penempatan->penilaian->nilai_hasil_kerja }}</p>
            </div>
        </div>

        <!-- Evaluasi -->
        <div class="mt-8">
            <h2 class="text-lg font-bold text-gray-800 mb-2">Evaluasi dari Pembimbing</h2>
            <div class="bg-gray-50 p-4 rounded border border-gray-200">
                <p class="text-gray-700 italic">
                    "{{ $penempatan->penilaian->evaluasi ?? 'Tidak ada evaluasi tertulis.' }}"
                </p>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum Ada Nilai</h3>
            <p class="mt-1 text-sm text-gray-500">Anda belum memiliki nilai PKL. Pastikan PKL Anda sudah selesai dan pembimbing telah menginput nilai.</p>
        </div>
    @endif
</div>
@endsection