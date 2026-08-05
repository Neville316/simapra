@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')
@section('header_title', 'Dashboard Saya')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Grafik Mahasiswa -->
    <div class="card lg:col-span-1">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Progres Logbook</h2>
        <div style="height: 250px;">
            <canvas id="mahasiswaChart"></canvas>
        </div>
    </div>

    <div class="card lg:col-span-2">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Informasi Penempatan PKL</h2>
        @if($penempatan)
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500">Instansi</p>
                    <p class="font-bold text-gray-800">{{ $penempatan->instansi->nama_instansi }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Pembimbing</p>
                    <p class="font-bold text-gray-800">{{ $penempatan->pembimbingInstansi->user->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Periode</p>
                    <p class="font-bold text-gray-800">{{ $penempatan->periodePkl->nama_periode ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full uppercase font-bold">Aktif</span>
                </div>
            </div>
        @else
            <p class="text-gray-500">Anda belum ditempatkan. Tunggu verifikasi Admin.</p>
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
                backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } 
        }
    });
</script>
@endpush
@endsection