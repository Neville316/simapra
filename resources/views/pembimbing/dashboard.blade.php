@extends('layouts.app')

@section('title', 'Dashboard Pembimbing')
@section('header_title', 'Dashboard Pembimbing Instansi')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <x-stat-card title="Total Mahasiswa Bimbingan" :value="$totalMahasiswa" color="blue" icon="<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z' />" />
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Grafik Pembimbing -->
    <div class="card lg:col-span-1">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Status Mahasiswa Bimbingan</h2>
        <div style="height: 250px;">
            <canvas id="pembimbingChart"></canvas>
        </div>
    </div>

    <div class="card lg:col-span-2">
        <h2 class="text-lg font-bold text-gray-800 mb-4">Daftar Mahasiswa Bimbingan</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                        <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi</th>
                        <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswaBimbingan as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-sm">{{ $item->mahasiswa->user->name }}</td>
                        <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                        <td class="py-3 px-4 text-sm">
                            <span class="text-xs px-2 py-1 rounded-full {{ $item->status == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} uppercase">{{ $item->status }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="py-4 text-center text-gray-500">Belum ada mahasiswa bimbingan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const ctxPemb = document.getElementById('pembimbingChart').getContext('2d');
    new Chart(ctxPemb, {
        type: 'bar',
        data: {
            labels: ['Aktif PKL', 'Selesai PKL'],
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: [{{ $mhsAktif }}, {{ $mhsSelesai }}],
                backgroundColor: ['#3b82f6', '#10b981'],
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