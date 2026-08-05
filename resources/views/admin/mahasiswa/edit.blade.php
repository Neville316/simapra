@extends('layouts.app')

@section('title', 'Edit Mahasiswa')
@section('header_title', 'Edit Data Mahasiswa')

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.mahasiswa.update', $mahasiswa) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Nama Lengkap *</label>
                <input type="text" name="name" value="{{ old('name', $mahasiswa->user->name) }}" class="form-input" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">NIM *</label>
                <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="form-input" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Angkatan</label>
                <input type="text" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" class="form-input">
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Program Studi</label>
                <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" class="form-input">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Username *</label>
                <input type="text" name="username" value="{{ old('username', $mahasiswa->user->username) }}" class="form-input" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email', $mahasiswa->user->email) }}" class="form-input" required>
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-input">
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.mahasiswa.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection