@extends('layouts.app')

@section('title', 'Monitoring PKL')
@section('header_title', 'Pusat Monitoring PKL')

@section('content')
<!-- Statistik Ringkas -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
    <div class="stat-card border-l-4 border-yellow-500">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Pengajuan Menunggu</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $statistik['pengajuan_menunggu'] }}</p>
    </div>
    <div class="stat-card border-l-4 border-blue-500">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Penempatan Aktif</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $statistik['penempatan_aktif'] }}</p>
    </div>
    <div class="stat-card border-l-4 border-green-500">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">PKL Selesai</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $statistik['penempatan_selesai'] }}</p>
    </div>
    <div class="stat-card border-l-4 border-orange-500">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Logbook Menunggu</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $statistik['logbook_menunggu'] }}</p>
    </div>
    <div class="stat-card border-l-4 border-red-500">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Logbook Revisi</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $statistik['logbook_revisi'] }}</p>
    </div>
    <div class="stat-card border-l-4 border-purple-500">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Total Dokumen</p>
        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $statistik['dokumen_total'] }}</p>
    </div>
</div>

<!-- Tabel Monitoring -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Top Mahasiswa (Nilai Tertinggi) -->
    <div class="card lg:col-span-1">
        <div class="card-header">
            <h2 class="card-title">🏆 Top Mahasiswa</h2>
            <span class="text-xs text-gray-400">Nilai Tertinggi</span>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mahasiswa</th>
                        <th class="text-center">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topNilai as $item)
                    <tr>
                        <td>
                            <div class="font-semibold text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">
                                {{ $item->penempatan->instansi->nama_instansi ?? '-' }}
                            </div>
                            <div class="text-xs text-gray-400 italic">
                                Pembimbing: {{ $item->penempatan->pembimbingInstansi->user->name ?? '-' }}
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="font-bold text-primary text-xl">{{ $item->nilai_akhir }}</span>
                            <span class="text-xs text-gray-400 block">({{ $item->grade }})</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-center text-gray-400 py-6 text-sm">Belum ada data penilaian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Grup Tabel Aktivitas (2 Kolom) -->
    <div class="lg:col-span-2 grid grid-cols-1 gap-6">
        
        <!-- Pengajuan Menunggu -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Pengajuan Menunggu Verifikasi</h2>
                <span class="badge badge-warning">{{ $statistik['pengajuan_menunggu'] }}</span>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mahasiswa</th>
                            <th>Instansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengajuanMenunggu as $item)
                        <tr>
                            <td class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</td>
                            <td class="text-gray-600">{{ $item->instansi->nama_instansi }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-gray-400 py-6 text-sm">Tidak ada pengajuan menunggu.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Penempatan Aktif -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Mahasiswa Aktif PKL</h2>
                <span class="badge badge-success">{{ $statistik['penempatan_aktif'] }}</span>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mahasiswa</th>
                            <th>Instansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penempatanAktif as $item)
                        <tr>
                            <td class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</td>
                            <td class="text-gray-600">{{ $item->instansi->nama_instansi }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-gray-400 py-6 text-sm">Tidak ada mahasiswa aktif.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Logbook Menunggu Validasi -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Logbook Menunggu Validasi</h2>
                <span class="badge badge-warning">{{ $statistik['logbook_menunggu'] }}</span>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mahasiswa</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logbookMenunggu as $item)
                        <tr>
                            <td class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</td>
                            <td class="text-gray-600">{{ $item->tanggal->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-gray-400 py-6 text-sm">Tidak ada logbook menunggu.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dokumen Terbaru -->
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Dokumen Terunggah Terbaru</h2>
                <span class="badge badge-info">{{ $statistik['dokumen_total'] }}</span>
            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mahasiswa</th>
                            <th>Jenis Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumenTerbaru as $item)
                        <tr>
                            <td class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</td>
                            <td class="text-gray-600">{{ $item->jenis_dokumen->label() }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center text-gray-400 py-6 text-sm">Tidak ada dokumen terbaru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection