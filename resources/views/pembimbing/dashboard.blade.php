@extends('layouts.app')

@section('title', 'Dashboard Pembimbing')
@section('header_title', 'Dashboard Pembimbing Instansi')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mb-6">
    <x-stat-card title="Total Mahasiswa Bimbingan" :value="$totalMahasiswa" color="blue" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z' />" />
    <x-stat-card title="Aktif PKL" :value="$mhsAktif" color="green" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z' />" />
    <x-stat-card title="Selesai PKL" :value="$mhsSelesai" color="purple" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' />" />
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Grafik Pembimbing -->
    <div class="card lg:col-span-1">
        <div class="card-header">
            <h2 class="card-title">📊 Status Mahasiswa</h2>
        </div>
        <div style="height: 250px;">
            <canvas id="pembimbingChart"></canvas>
        </div>
        <div class="mt-4 grid grid-cols-2 gap-2 text-center text-xs">
            <div>
                <span class="inline-block w-2.5 h-2.5 bg-primary rounded-full mr-1"></span>
                <span class="text-gray-600">Aktif PKL</span>
                <span class="font-bold text-gray-800 block">{{ $mhsAktif }}</span>
            </div>
            <div>
                <span class="inline-block w-2.5 h-2.5 bg-success rounded-full mr-1"></span>
                <span class="text-gray-600">Selesai PKL</span>
                <span class="font-bold text-gray-800 block">{{ $mhsSelesai }}</span>
            </div>
        </div>
    </div>

    <div class="card lg:col-span-2">
        <div class="card-header">
            <h2 class="card-title">📋 Daftar Mahasiswa Bimbingan</h2>
            <span class="badge badge-info">{{ $mahasiswaBimbingan->count() }}</span>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Instansi</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswaBimbingan as $item)
                    <tr>
                        <td>
                            <div class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                            <div class="text-xs text-gray-400">{{ $item->mahasiswa->nim }}</div>
                        </td>
                        <td class="text-gray-600">{{ $item->instansi->nama_instansi }}</td>
                        <td class="text-center">
                            @if($item->status == 'aktif')
                                <span class="badge badge-success uppercase">Aktif</span>
                            @elseif($item->status == 'selesai')
                                <span class="badge badge-gray uppercase">Selesai</span>
                            @else
                                <span class="badge badge-warning uppercase">{{ $item->status }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-400 py-6 text-sm">
                            Belum ada mahasiswa bimbingan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($mahasiswaBimbingan->count() > 0)
            <div class="mt-3 text-right">
                <a href="{{ route('pembimbing.mahasiswa.index') }}" class="text-sm text-primary hover:text-primary-hover font-medium transition">
                    Lihat Semua →
                </a>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    const ctxPemb = document.getElementById('pembimbingChart').getContext('2d');
    new Chart(ctxPemb, {
        type: 'doughnut',
        data: {
            labels: ['Aktif PKL', 'Selesai PKL'],
            datasets: [{
                data: [{{ $mhsAktif }}, {{ $mhsSelesai }}],
                backgroundColor: ['#4f46e5', '#22c55e'],
                borderWidth: 0,
            }]
        },
        options: { 
            responsive: true, 
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 16,
                        font: { size: 11 }
                    }
                }
            },
            cutout: '70%'
        }
    });
</script>
@endpush
@endsection