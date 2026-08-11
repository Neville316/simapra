@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('header_title', 'Dashboard Administrator')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5 mb-6">
    <x-stat-card title="Total Mahasiswa" :value="$totalMahasiswa" color="blue" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z' />" />
    <x-stat-card title="Mahasiswa Aktif PKL" :value="$mahasiswaAktif" color="green" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z' />" />
    <x-stat-card title="Instansi Mitra" :value="$totalInstansi" color="purple" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4' />" />
    <x-stat-card title="Pembimbing Instansi" :value="$totalPembimbing" color="yellow" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z' />" />
    <x-stat-card title="Pengajuan Menunggu" :value="$pengajuanMenunggu" color="red" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z' />" />
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Grafik Admin -->
    <div class="card lg:col-span-1">
        <div class="card-header">
            <h2 class="card-title">Status Penempatan PKL</h2>
        </div>
        <div style="height: 250px;">
            <canvas id="adminChart"></canvas>
        </div>
    </div>

    <div class="card lg:col-span-2">
        <div class="card-header">
            <h2 class="card-title">Pengajuan Terbaru</h2>
            <span class="badge badge-info">{{ $pengajuanTerbaru->count() }}</span>
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
                    @forelse($pengajuanTerbaru as $item)
                    <tr>
                        <td class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</td>
                        <td class="text-gray-600">{{ $item->instansi->nama_instansi }}</td>
                        <td class="text-center">
                            <span class="badge {{ $item->status->color() }}">{{ $item->status->label() }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-400 py-6 text-sm">Tidak ada pengajuan baru.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const ctxAdmin = document.getElementById('adminChart').getContext('2d');
    new Chart(ctxAdmin, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', 'Selesai', 'Dibatalkan'],
            datasets: [{
                data: [{{ $aktif }}, {{ $selesai }}, {{ $batal }}],
                backgroundColor: ['#22c55e', '#4f46e5', '#ef4444'],
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
                    }
                }
            },
            cutout: '70%'
        }
    });
</script>
@endpush
@endsection