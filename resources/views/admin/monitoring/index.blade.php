@extends('layouts.app')

@section('title', 'Monitoring PKL')
@section('header_title', 'Pusat Monitoring PKL')

@section('content')
<!-- Statistik Ringkas -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-yellow-500">
        <p class="text-xs text-gray-500 uppercase">Pengajuan Menunggu</p>
        <p class="text-2xl font-bold text-gray-800">{{ $statistik['pengajuan_menunggu'] }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-blue-500">
        <p class="text-xs text-gray-500 uppercase">Penempatan Aktif</p>
        <p class="text-2xl font-bold text-gray-800">{{ $statistik['penempatan_aktif'] }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-green-500">
        <p class="text-xs text-gray-500 uppercase">PKL Selesai</p>
        <p class="text-2xl font-bold text-gray-800">{{ $statistik['penempatan_selesai'] }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-orange-500">
        <p class="text-xs text-gray-500 uppercase">Logbook Menunggu</p>
        <p class="text-2xl font-bold text-gray-800">{{ $statistik['logbook_menunggu'] }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-red-500">
        <p class="text-xs text-gray-500 uppercase">Logbook Revisi</p>
        <p class="text-2xl font-bold text-gray-800">{{ $statistik['logbook_revisi'] }}</p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-purple-500">
        <p class="text-xs text-gray-500 uppercase">Total Dokumen</p>
        <p class="text-2xl font-bold text-gray-800">{{ $statistik['dokumen_total'] }}</p>
    </div>
</div>

<!-- Tabel Monitoring -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    
    <!-- Top Mahasiswa (Nilai Tertinggi) -->
    <div class="card lg:col-span-1">
        <h2 class="text-lg font-bold text-gray-800 mb-4">🏆 Top Mahasiswa (Nilai Tertinggi)</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-2 px-3 text-xs font-semibold text-gray-600">Mahasiswa</th>
                        <th class="py-2 px-3 text-xs font-semibold text-gray-600">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($topNilai as $item)
                    <tr class="border-b">
                        <td class="py-2 px-3 text-sm">
                            <div class="font-semibold text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                            <div class="text-xs text-gray-500">
                                {{ $item->penempatan->instansi->nama_instansi ?? '-' }}<br>
                                <span class="italic">Pembimbing: {{ $item->penempatan->pembimbingInstansi->user->name ?? '-' }}</span>
                            </div>
                        </td>
                        <td class="py-2 px-3 text-sm align-top">
                            <span class="font-bold text-blue-600 text-lg">{{ $item->nilai_akhir }}</span>
                            <span class="text-xs text-gray-500">({{ $item->grade }})</span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="2" class="py-4 text-center text-gray-500 text-sm">Belum ada data penilaian.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Grup Tabel Aktivitas (2 Kolom) -->
    <div class="lg:col-span-2 grid grid-cols-1 gap-6">
        
        <!-- Pengajuan Menunggu -->
        <div class="card">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Pengajuan Menunggu Verifikasi</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Mahasiswa</th>
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Instansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengajuanMenunggu as $item)
                        <tr class="border-b">
                            <td class="py-2 px-3 text-sm">{{ $item->mahasiswa->user->name }}</td>
                            <td class="py-2 px-3 text-sm">{{ $item->instansi->nama_instansi }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="py-4 text-center text-gray-500 text-sm">Tidak ada.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Penempatan Aktif -->
        <div class="card">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Mahasiswa Aktif PKL</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Mahasiswa</th>
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Instansi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($penempatanAktif as $item)
                        <tr class="border-b">
                            <td class="py-2 px-3 text-sm">{{ $item->mahasiswa->user->name }}</td>
                            <td class="py-2 px-3 text-sm">{{ $item->instansi->nama_instansi }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="py-4 text-center text-gray-500 text-sm">Tidak ada.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Logbook Menunggu Validasi -->
        <div class="card">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Logbook Menunggu Validasi</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Mahasiswa</th>
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logbookMenunggu as $item)
                        <tr class="border-b">
                            <td class="py-2 px-3 text-sm">{{ $item->mahasiswa->user->name }}</td>
                            <td class="py-2 px-3 text-sm">{{ $item->tanggal->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="py-4 text-center text-gray-500 text-sm">Tidak ada.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dokumen Terbaru -->
        <div class="card">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Dokumen Terunggah Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Mahasiswa</th>
                            <th class="py-2 px-3 text-xs font-semibold text-gray-600">Jenis Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumenTerbaru as $item)
                        <tr class="border-b">
                            <td class="py-2 px-3 text-sm">{{ $item->mahasiswa->user->name }}</td>
                            <td class="py-2 px-3 text-sm">{{ $item->jenis_dokumen->label() }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="2" class="py-4 text-center text-gray-500 text-sm">Tidak ada.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection