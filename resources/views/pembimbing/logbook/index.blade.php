@extends('layouts.app')

@section('title', 'Validasi Logbook')
@section('header_title', 'Validasi Logbook Mahasiswa Bimbingan')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="alert alert-success">
            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Mahasiswa</th>
                    <th>Tanggal</th>
                    <th>Aktivitas</th>
                    <th>Dokumentasi</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logbooks as $item)
                <tr>
                    <td class="font-medium text-gray-800">{{ $item->mahasiswa->user->name }}</td>
                    <td class="text-gray-600 whitespace-nowrap">{{ $item->tanggal->format('d M Y') }}</td>
                    <td class="text-gray-600 max-w-xs truncate" title="{{ $item->aktivitas }}">{{ $item->aktivitas }}</td>
                    <td>
                        @if($item->dokumentasi_path)
                            <a href="{{ Storage::url($item->dokumentasi_path) }}" target="_blank" class="inline-flex items-center text-xs font-medium text-blue-600 bg-blue-50 px-2.5 py-1 rounded-md hover:bg-blue-100 transition">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Lihat
                            </a>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <span class="badge {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                        @if($item->status == \App\Enums\StatusLogbook::REVISI)
                            <div class="text-xs text-red-500 mt-1 italic">"{{ $item->catatan_revisi }}"</div>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($item->status == \App\Enums\StatusLogbook::MENUNGGU_VALIDASI)
                            <div class="flex items-center justify-center gap-1.5">
                                <form action="{{ route('pembimbing.logbook.validate', $item) }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-success rounded-md hover:bg-green-600 transition">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Validasi
                                    </button>
                                </form>
                                
                                <button x-data @click="$dispatch('open-modal', { id: {{ $item->id }} })" class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-danger rounded-md hover:bg-red-600 transition">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    Revisi
                                </button>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs italic">Selesai</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-400 py-8">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        Tidak ada logbook yang menunggu validasi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Revisi (AlpineJS) -->
<div x-data="{ show: false, logbookId: null }" 
     @open-modal.window="show = true; logbookId = $event.detail.id" 
     @keydown.escape.window="show = false" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     class="modal-overlay" 
     style="display: none;">
    <div class="modal-content">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Minta Revisi Logbook</h3>
            <button @click="show = false" class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        
        <form id="rejectForm" action="" method="POST">
            @csrf
            <input type="hidden" name="action" value="reject">
            <div class="mb-4">
                <label class="form-label">Catatan Revisi <span class="text-danger">*</span></label>
                <textarea name="catatan_revisi" rows="4" class="form-input" required placeholder="Jelaskan apa yang harus diperbaiki mahasiswa..."></textarea>
            </div>
            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" @click="show = false" class="btn-secondary">Batal</button>
                <button type="submit" class="btn-danger">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Kirim Revisi
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
                form.action = `/pembimbing/logbook/${e.detail.id}/validate`;
            }
        })
    })
</script>
@endsection