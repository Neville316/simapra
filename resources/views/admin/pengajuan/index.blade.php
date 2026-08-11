@extends('layouts.app')

@section('title', 'Verifikasi Pengajuan PKL')
@section('header_title', 'Verifikasi Pengajuan Mahasiswa')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="alert alert-success">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('error') }}
        </div>
    @endif

    <div class="card-header flex-wrap gap-3">
        <h2 class="card-title">Daftar Pengajuan Masuk</h2>
        <form action="{{ route('admin.pengajuan.index') }}" method="GET">
            <select name="status" class="form-input w-48" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="menunggu" @if(request('status') == 'menunggu') selected @endif>Menunggu</option>
                <option value="disetujui" @if(request('status') == 'disetujui') selected @endif>Disetujui</option>
                <option value="ditolak" @if(request('status') == 'ditolak') selected @endif>Ditolak</option>
            </select>
        </form>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Instansi Tujuan</th>
                    <th>Tanggal</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengajuans as $item)
                <tr>
                    <td>
                        <div class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</div>
                        <div class="text-xs text-gray-400">{{ $item->mahasiswa->nim }}</div>
                    </td>
                    <td class="text-gray-600">{{ $item->instansi->nama_instansi }}</td>
                    <td class="text-gray-600">{{ $item->tanggal_pengajuan->format('d M Y') }}</td>
                    <td class="text-center">
                        <span class="badge {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                        @if($item->status == \App\Enums\StatusPengajuan::DITOLAK)
                            <div class="text-xs text-red-500 mt-1 italic">"{{ $item->catatan }}"</div>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($item->status == \App\Enums\StatusPengajuan::MENUNGGU)
                            <div class="flex items-center justify-center gap-1.5">
                                <form action="{{ route('admin.pengajuan.verify', $item) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-success rounded-md hover:bg-green-600 transition">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Setujui
                                    </button>
                                </form>
                                
                                <button x-data @click="$dispatch('open-modal', { id: {{ $item->id }}, name: '{{ $item->mahasiswa->user->name }}' })" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-danger rounded-md hover:bg-red-600 transition">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    Tolak
                                </button>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs italic">Selesai Diproses</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-400 py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        Tidak ada data pengajuan.
                    </td>
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
<div x-data="{ show: false, pengajuanId: null, mahasiswaName: '' }" 
     @open-modal.window="show = true; pengajuanId = $event.detail.id; mahasiswaName = $event.detail.name" 
     @keydown.escape.window="show = false" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     class="modal-overlay" 
     style="display: none;">
    <div class="modal-content">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Tolak Pengajuan</h3>
            <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        
        <p class="text-sm text-gray-600 mb-4">Anda akan menolak pengajuan dari: <strong x-text="mahasiswaName"></strong></p>
        
        <form id="rejectForm" action="" method="POST">
            @csrf
            <input type="hidden" name="action" value="reject">
            <div class="mb-4">
                <label class="form-label">Catatan / Alasan Penolakan <span class="text-danger">*</span></label>
                <textarea name="catatan" rows="4" class="form-input" required placeholder="Contoh: Dokumen belum lengkap, silakan perbaiki..."></textarea>
            </div>
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" @click="show = false" class="btn-secondary">Batal</button>
                <button type="submit" class="btn-danger">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Kirim Penolakan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
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