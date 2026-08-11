@extends('layouts.app')

@section('title', 'Form Penilaian')
@section('header_title', 'Penilaian untuk: ' . $penempatan->mahasiswa->user->name)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Form Penilaian PKL</h2>
            <span class="text-xs text-gray-400">* wajib diisi</span>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Informasi Mahasiswa -->
        <div class="bg-gray-50/80 rounded-lg p-4 mb-6 border border-gray-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Mahasiswa</p>
                    <p class="font-semibold text-gray-800">{{ $penempatan->mahasiswa->user->name }}</p>
                    <p class="text-xs text-gray-400">{{ $penempatan->mahasiswa->nim }} - {{ $penempatan->mahasiswa->program_studi }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Instansi</p>
                    <p class="font-semibold text-gray-800">{{ $penempatan->instansi->nama_instansi }}</p>
                    <p class="text-xs text-gray-400">Periode: {{ $penempatan->periodePkl->nama_periode ?? '-' }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('pembimbing.penilaian.store', $penempatan) }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-4">
                <div class="mb-4 md:mb-0">
                    <label class="form-label">Nilai Kedisiplinan <span class="text-danger">*</span></label>
                    <input type="number" name="nilai_kedisiplinan" class="form-input" min="0" max="100" required value="{{ old('nilai_kedisiplinan', 80) }}">
                    <p class="text-xs text-gray-400 mt-1">Rentang 0 - 100</p>
                    @error('nilai_kedisiplinan')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:mb-0">
                    <label class="form-label">Nilai Kemampuan Kerja <span class="text-danger">*</span></label>
                    <input type="number" name="nilai_kemampuan_kerja" class="form-input" min="0" max="100" required value="{{ old('nilai_kemampuan_kerja', 80) }}">
                    <p class="text-xs text-gray-400 mt-1">Rentang 0 - 100</p>
                    @error('nilai_kemampuan_kerja')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-4">
                <div class="mb-4 md:mb-0">
                    <label class="form-label">Nilai Komunikasi <span class="text-danger">*</span></label>
                    <input type="number" name="nilai_komunikasi" class="form-input" min="0" max="100" required value="{{ old('nilai_komunikasi', 80) }}">
                    <p class="text-xs text-gray-400 mt-1">Rentang 0 - 100</p>
                    @error('nilai_komunikasi')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 md:mb-0">
                    <label class="form-label">Nilai Hasil Kerja <span class="text-danger">*</span></label>
                    <input type="number" name="nilai_hasil_kerja" class="form-input" min="0" max="100" required value="{{ old('nilai_hasil_kerja', 80) }}">
                    <p class="text-xs text-gray-400 mt-1">Rentang 0 - 100</p>
                    @error('nilai_hasil_kerja')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Rekomendasi Rekrutmen <span class="text-danger">*</span></label>
                <select name="rekomendasi" class="form-input" required>
                    <option value="Diterima">✅ Diterima</option>
                    <option value="Dipertimbangkan">⚠️ Dipertimbangkan</option>
                    <option value="Tidak Diterima">❌ Tidak Diterima</option>
                </select>
                @error('rekomendasi')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Evaluasi / Catatan Akhir</label>
                <textarea name="evaluasi" rows="4" class="form-input" placeholder="Tulis evaluasi singkat mengenai kinerja mahasiswa...">{{ old('evaluasi') }}</textarea>
                @error('evaluasi')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="bg-amber-50 border-l-4 border-amber-400 p-4 mb-4 rounded-r-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <div>
                        <p class="text-sm font-semibold text-amber-700">Perhatian!</p>
                        <p class="text-xs text-amber-600">Setelah disimpan, status PKL mahasiswa akan berubah menjadi <strong>Selesai</strong> dan tidak dapat diubah lagi.</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <a href="{{ route('pembimbing.penilaian.index') }}" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Simpan Penilaian
                </button>
            </div>
        </form>
    </div>
</div>
@endsection