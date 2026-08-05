@extends('layouts.app')

@section('title', 'Edit Pembimbing')
@section('header_title', 'Edit Data Pembimbing')

@section('content')
<div class="card">
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.pembimbing.update', $pembimbing) }}" method="POST">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Nama Lengkap *</label>
                <input type="text" name="name" value="{{ old('name', $pembimbing->user->name) }}" class="form-input" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Instansi *</label>
                <select name="instansi_id" class="form-input" required>
                    @foreach($instansi as $i)
                    <option value="{{ $i->id }}" @if(old('instansi_id', $pembimbing->instansi_id) == $i->id) selected @endif>{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Jabatan</label>
                <input type="text" name="jabatan" value="{{ old('jabatan', $pembimbing->jabatan) }}" class="form-input">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">NIP</label>
                <input type="text" name="nip" value="{{ old('nip', $pembimbing->nip) }}" class="form-input">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email', $pembimbing->user->email) }}" class="form-input" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2">Username *</label>
                <input type="text" name="username" value="{{ old('username', $pembimbing->user->username) }}" class="form-input" required>
            </div>
            <div class="mb-4 col-span-2">
                <label class="block text-sm font-bold mb-2">Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="password" class="form-input">
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('admin.pembimbing.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">Batal</a>
            <button type="submit" class="btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection