@extends('layouts.app')

@section('title', 'Verifikasi Pengajuan PKL')
@section('header_title', 'Verifikasi Pengajuan Mahasiswa')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold text-gray-800">Daftar Pengajuan Masuk</h2>
        <form action="{{ route('admin.pengajuan.index') }}" method="GET">
            <select name="status" class="form-input inline-block w-48" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="menunggu" @if(request('status') == 'menunggu') selected @endif>Menunggu</option>
                <option value="disetujui" @if(request('status') == 'disetujui') selected @endif>Disetujui</option>
                <option value="ditolak" @if(request('status') == 'ditolak') selected @endif>Ditolak</option>
            </select>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Instansi Tujuan</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuans as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">
                        <div class="font-semibold text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                        <div class="text-xs text-gray-500">{{ $item->mahasiswa->nim }}</div>
                    </td>
                    <td class="py-3 px-4 text-sm">{{ $item->instansi->nama_instansi }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->tanggal_pengajuan->format('d M Y') }}</td>
                    <td class="py-3 px-4 text-sm">
                        <span class="text-xs px-2 py-1 rounded-full {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                        @if($item->status == \App\Enums\StatusPengajuan::DITOLAK)
                            <div class="text-xs text-red-500 mt-1 italic">"{{ $item->catatan }}"</div>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm text-center">
                        @if($item->status == \App\Enums\StatusPengajuan::MENUNGGU)
                            <form action="{{ route('admin.pengajuan.verify', $item) }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="action" value="approve">
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xs font-bold py-1.5 px-3 rounded mr-1">Setujui</button>
                            </form>
                            
                            <!-- Tombol Tolak (Memicu Modal AlpineJS) -->
                            <button x-data @click="$dispatch('open-modal', { id: {{ $item->id }}, name: '{{ $item->mahasiswa->user->name }}' })" class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1.5 px-3 rounded">Tolak</button>
                        @else
                            <span class="text-gray-400 text-xs italic">Selesai Diproses</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-500">Tidak ada data pengajuan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $pengajuans->links() }}
    </div>
</div>

<!-- Modal Penolakan (AlpineJS) -->
<div x-data="{ show: false, pengajuanId: null, mahasiswaName: '' }" @open-modal.window="show = true; pengajuanId = $event.detail.id; mahasiswaName = $event.detail.name" @keydown.escape.window="show = false" x-show="show" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Tolak Pengajuan</h3>
        <p class="text-sm text-gray-600 mb-4">Anda menolak pengajuan dari: <strong x-text="mahasiswaName"></strong></p>
        
        <form id="rejectForm" action="" method="POST">
            @csrf
            <input type="hidden" name="action" value="reject">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Catatan / Alasan Penolakan *</label>
                <textarea name="catatan" rows="4" class="form-input" required placeholder="Contoh: Dokumen belum lengkap, silakan perbaiki..."></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" @click="show = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Batal</button>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Kirim Penolakan</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Set action form saat modal dibuka
    document.addEventListener('alpine:init', () => {
        window.addEventListener('open-modal', (e) => {
            const form = document.getElementById('rejectForm');
            if(form) {
                form.action = `/admin/pengajuan/${e.detail.id}/verify`;
            }
        })
    })
</script>
@endsection