@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')
@section('header_title', 'Dashboard Saya')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Grafik Mahasiswa -->
    <div class="card lg:col-span-1">
        <div class="card-header">
            <h2 class="card-title">📊 Progres Logbook</h2>
        </div>
        <div style="height: 250px;">
            <canvas id="mahasiswaChart"></canvas>
        </div>
        <div class="mt-4 grid grid-cols-3 gap-2 text-center text-xs">
            <div>
                <span class="inline-block w-2.5 h-2.5 bg-success rounded-full mr-1"></span>
                <span class="text-gray-600">Tervalidasi</span>
                <span class="font-bold text-gray-800 block">{{ $logTervalidasi }}</span>
            </div>
            <div>
                <span class="inline-block w-2.5 h-2.5 bg-warning rounded-full mr-1"></span>
                <span class="text-gray-600">Menunggu</span>
                <span class="font-bold text-gray-800 block">{{ $logMenunggu }}</span>
            </div>
            <div>
                <span class="inline-block w-2.5 h-2.5 bg-danger rounded-full mr-1"></span>
                <span class="text-gray-600">Revisi</span>
                <span class="font-bold text-gray-800 block">{{ $logRevisi }}</span>
            </div>
        </div>
    </div>

    <div class="card lg:col-span-2">
        <div class="card-header">
            <h2 class="card-title">📋 Informasi Penempatan PKL</h2>
        </div>
        @if($penempatan)
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Instansi</p>
                    <p class="font-bold text-gray-800 mt-0.5">{{ $penempatan->instansi->nama_instansi }}</p>
                </div>
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Pembimbing</p>
                    <p class="font-bold text-gray-800 mt-0.5">{{ $penempatan->pembimbingInstansi->user->name ?? '-' }}</p>
                </div>
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Periode</p>
                    <p class="font-bold text-gray-800 mt-0.5">{{ $penempatan->periodePkl->nama_periode ?? '-' }}</p>
                </div>
                <div class="bg-gray-50/80 rounded-xl p-4 border border-gray-100">
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Status</p>
                    <span class="badge badge-success mt-0.5 inline-block">✅ Aktif</span>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-2 text-sm text-gray-500">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Pastikan Anda mengisi logbook harian selama PKL berlangsung.</span>
            </div>
        @else
            <div class="text-center py-8">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <p class="text-gray-400">Anda belum ditempatkan. Tunggu verifikasi Admin.</p>
                <a href="{{ route('mahasiswa.pengajuan.create') }}" class="btn-primary text-sm mt-3 inline-flex">
                    <svg class="w-4 h-4 mr-1.5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Ajukan PKL
                </a>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    const ctxMhs = document.getElementById('mahasiswaChart').getContext('2d');
    new Chart(ctxMhs, {
        type: 'bar',
        data: {
            labels: ['Tervalidasi', 'Menunggu', 'Revisi'],
            datasets: [{
                label: 'Jumlah Logbook',
                data: [{{ $logTervalidasi }}, {{ $logMenunggu }}, {{ $logRevisi }}],
                backgroundColor: ['#22c55e', '#f59e0b', '#ef4444'],
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: { 
                y: { 
                    beginAtZero: true, 
                    ticks: { stepSize: 1, font: { size: 10 } },
                    grid: { display: false }
                },
                x: { grid: { display: false } }
            } 
        }
    });
</script>
@endpush
@endsection