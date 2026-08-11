@extends('layouts.app')

@section('title', 'Nilai PKL Saya')
@section('header_title', 'Hasil Penilaian PKL')

@section('content')
<div class="card">
    @if(session('error'))
        <div class="alert alert-danger">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
    @endif

    @if($penempatan && $penempatan->penilaian)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Nilai Akhir & Grade -->
            <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-6 text-center border border-primary/20">
                <p class="text-xs font-semibold text-primary uppercase tracking-wider">Nilai Akhir</p>
                <p class="text-5xl font-bold text-primary mt-2">{{ $penempatan->penilaian->nilai_akhir }}</p>
                <p class="text-xl font-bold text-primary/70 mt-0.5">({{ $penempatan->penilaian->grade }})</p>
                <div class="mt-3 h-1.5 w-full bg-primary/10 rounded-full overflow-hidden">
                    <div class="h-full bg-primary rounded-full" style="width: {{ ($penempatan->penilaian->nilai_akhir / 100) * 100 }}%"></div>
                </div>
            </div>

            <!-- Info PKL -->
            <div class="md:col-span-2 grid grid-cols-2 gap-4">
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Instansi</p>
                    <p class="font-bold text-gray-800 mt-0.5">{{ $penempatan->instansi->nama_instansi }}</p>
                </div>
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Pembimbing</p>
                    <p class="font-bold text-gray-800 mt-0.5">{{ $penempatan->pembimbingInstansi->user->name ?? '-' }}</p>
                </div>
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Status PKL</p>
                    <span class="badge badge-success mt-0.5 inline-block">✅ Selesai</span>
                </div>
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Rekomendasi Rekrutmen</p>
                    <span class="badge badge-warning mt-0.5 inline-block">{{ $penempatan->penilaian->rekomendasi }}</span>
                </div>
            </div>
        </div>

        <!-- Rincian Nilai -->
        <h2 class="text-lg font-bold text-gray-800 mb-4 mt-8">Rincian Komponen Nilai</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-50/80 rounded-xl p-4 text-center border border-gray-100 hover:shadow-md transition">
                <p class="text-xs text-gray-400 uppercase tracking-wider">Kedisiplinan</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $penempatan->penilaian->nilai_kedisiplinan }}</p>
            </div>
            <div class="bg-gray-50/80 rounded-xl p-4 text-center border border-gray-100 hover:shadow-md transition">
                <p class="text-xs text-gray-400 uppercase tracking-wider">Kemampuan Kerja</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $penempatan->penilaian->nilai_kemampuan_kerja }}</p>
            </div>
            <div class="bg-gray-50/80 rounded-xl p-4 text-center border border-gray-100 hover:shadow-md transition">
                <p class="text-xs text-gray-400 uppercase tracking-wider">Komunikasi</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $penempatan->penilaian->nilai_komunikasi }}</p>
            </div>
            <div class="bg-gray-50/80 rounded-xl p-4 text-center border border-gray-100 hover:shadow-md transition">
                <p class="text-xs text-gray-400 uppercase tracking-wider">Hasil Kerja</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">{{ $penempatan->penilaian->nilai_hasil_kerja }}</p>
            </div>
        </div>

        <!-- Evaluasi -->
        <div class="mt-8">
            <h2 class="text-lg font-bold text-gray-800 mb-3">📝 Evaluasi dari Pembimbing</h2>
            <div class="bg-gradient-to-br from-gray-50 to-gray-100/50 rounded-xl p-5 border border-gray-200">
                <p class="text-gray-700 italic leading-relaxed">
                    "{{ $penempatan->penilaian->evaluasi ?? 'Tidak ada evaluasi tertulis.' }}"
                </p>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <h3 class="mt-4 text-lg font-semibold text-gray-700">Belum Ada Nilai</h3>
            <p class="mt-2 text-sm text-gray-400 max-w-sm mx-auto">Anda belum memiliki nilai PKL. Pastikan PKL Anda sudah selesai dan pembimbing telah menginput nilai.</p>
        </div>
    @endif
</div>
@endsection