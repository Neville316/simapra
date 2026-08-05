<!-- Path: resources/views/auth/register-success.blade.php -->
@extends('auth.app')

@section('title', 'Registrasi Berhasil')

@section('content')
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 text-center" x-data="{ copied: false }">
    <!-- Ikon Sukses -->
    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-4">
        <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-2">Registrasi Berhasil!</h2>
    <p class="text-gray-600 mb-6">Akun Anda telah dibuat. Silakan gunakan username di bawah ini untuk login.</p>
    
    <!-- Box Username -->
    <div class="bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg p-4 mb-6 relative">
        <p class="text-sm text-gray-500 mb-1">Username Anda</p>
        <h3 class="text-3xl font-mono font-bold text-blue-600 tracking-widest">{{ session('generated_username') }}</h3>
        
        <!-- Tombol Copy -->
        <button @click="
            navigator.clipboard.writeText('{{ session('generated_username') }}');
            copied = true;
            setTimeout(() => copied = false, 2000)
        " class="mt-3 inline-flex items-center px-3 py-1 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 00-2 2v6a2 2 0 002 2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2m-6-4h6m2-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            <span x-text="copied ? 'Tersalin!' : 'Salin'"></span>
        </button>
    </div>

    <p class="text-xs text-red-500 font-medium mb-6">⚠️ Harap ingat/menyimpan username ini. Anda tidak dapat login tanpa username.</p>

    <a href="{{ route('login') }}" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        Ke Halaman Login
    </a>
</div>
@endsection