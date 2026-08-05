@extends('layouts.app')

@section('title', 'Form Penilaian')
@section('header_title', 'Penilaian untuk: ' . $penempatan->mahasiswa->user->name)

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('pembimbing.penilaian.store', $penempatan) }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Nilai Kedisiplinan (0-100) *</label>
                <input type="number" name="nilai_kedisiplinan" class="form-input" min="0" max="100" required value="{{ old('nilai_kedisiplinan', 80) }}">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Nilai Kemampuan Kerja (0-100) *</label>
                <input type="number" name="nilai_kemampuan_kerja" class="form-input" min="0" max="100" required value="{{ old('nilai_kemampuan_kerja', 80) }}">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Nilai Komunikasi (0-100) *</label>
                <input type="number" name="nilai_komunikasi" class="form-input" min="0" max="100" required value="{{ old('nilai_komunikasi', 80) }}">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Nilai Hasil Kerja (0-100) *</label>
                <input type="number" name="nilai_hasil_kerja" class="form-input" min="0" max="100" required value="{{ old('nilai_hasil_kerja', 80) }}">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Rekomendasi Rekrutmen *</label>
            <select name="rekomendasi" class="form-input" required>
                <option value="Diterima">Diterima</option>
                <option value="Dipertimbangkan">Dipertimbangkan</option>
                <option value="Tidak Diterima">Tidak Diterima</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-bold mb-2">Evaluasi / Catatan Akhir</label>
            <textarea name="evaluasi" rows="4" class="form-input" placeholder="Tulis evaluasi singkat mengenai kinerja mahasiswa...">{{ old('evaluasi') }}</textarea>
        </div>

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4 text-sm text-yellow-700">
            <strong>Perhatian:</strong> Setelah disimpan, status PKL mahasiswa akan berubah menjadi <strong>Selesai</strong> dan tidak dapat diubah lagi.
        </div>

        <div class="flex justify-end">
            <a href="{{ route('pembimbing.penilaian.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="btn-primary">Simpan Penilaian</button>
        </div>
    </form>
</div>
@endsection