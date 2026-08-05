@extends('layouts.app')

@section('title', 'Validasi Logbook')
@section('header_title', 'Validasi Logbook Mahasiswa Bimbingan')

@section('content')
<div class="card">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Mahasiswa</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Tanggal</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Aktivitas</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Dokumentasi</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                    <th class="py-3 px-4 text-sm font-semibold text-gray-600 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logbooks as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm font-semibold">{{ $item->mahasiswa->user->name }}</td>
                    <td class="py-3 px-4 text-sm whitespace-nowrap">{{ $item->tanggal->format('d M Y') }}</td>
                    <td class="py-3 px-4 text-sm max-w-xs truncate" title="{{ $item->aktivitas }}">{{ $item->aktivitas }}</td>
                    <td class="py-3 px-4 text-sm">
                        @if($item->dokumentasi_path)
                            <a href="{{ Storage::url($item->dokumentasi_path) }}" target="_blank" class="text-blue-500 hover:underline">Lihat</a>
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm">
                        <span class="text-xs px-2 py-1 rounded-full {{ $item->status->color() }}">
                            {{ $item->status->label() }}
                        </span>
                        @if($item->status == \App\Enums\StatusLogbook::REVISI)
                            <div class="text-xs text-red-500 mt-1 italic">"{{ $item->catatan_revisi }}"</div>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-sm text-center">
                        <form action="{{ route('pembimbing.logbook.validate', $item) }}" method="POST" class="inline-block">
                            @csrf
                            <input type="hidden" name="action" value="approve">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-xs font-bold py-1.5 px-3 rounded mr-1">Validasi</button>
                        </form>
                        
                        <button x-data @click="$dispatch('open-modal', { id: {{ $item->id }} })" class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold py-1.5 px-3 rounded">Revisi</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 text-center text-gray-500">Tidak ada logbook yang menunggu validasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Revisi (AlpineJS) -->
<div x-data="{ show: false, logbookId: null }" @open-modal.window="show = true; logbookId = $event.detail.id" @keydown.escape.window="show = false" x-show="show" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Minta Revisi Logbook</h3>
        
        <form id="rejectForm" action="" method="POST">
            @csrf
            <input type="hidden" name="action" value="reject">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Catatan Revisi *</label>
                <textarea name="catatan_revisi" rows="4" class="form-input" required placeholder="Jelaskan apa yang harus diperbaiki mahasiswa..."></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" @click="show = false" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Batal</button>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Kirim Revisi</button>
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