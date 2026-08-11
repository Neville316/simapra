<!-- Path: resources/views/auth/register-success.blade.php -->
@extends('auth.app')

@section('title', 'Registrasi Berhasil')

@section('content')
<div class="bg-white shadow-xl rounded-2xl px-8 pt-8 pb-6 mb-4 text-center" x-data="{ copied: false }">
    <!-- Ikon Sukses -->
    <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-100 mb-4">
        <svg class="h-10 w-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-2">Registrasi Berhasil! 🎉</h2>
    <p class="text-gray-600 mb-6">Akun Anda telah dibuat. Silakan gunakan username di bawah ini untuk login.</p>
    
    <!-- Box Username -->
    <div class="bg-gradient-to-br from-gray-50 to-gray-100/80 border-2 border-dashed border-primary/30 rounded-2xl p-5 mb-6 relative">
        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Username Anda</p>
        <h3 class="text-3xl font-mono font-bold text-primary tracking-widest">{{ session('generated_username') }}</h3>
        
        <!-- Tombol Copy -->
        <button @click="
            navigator.clipboard.writeText('{{ session('generated_username') }}');
            copied = true;
            setTimeout(() => copied = false, 2000)
        " class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-xl shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary/30">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 00-2 2v6a2 2 0 002 2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2m-6-4h6m2-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            <span x-text="copied ? '✅ Tersalin!' : '📋 Salin'"></span>
        </button>
    </div>

    <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 mb-6">
        <p class="text-xs text-amber-700 font-medium flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            ⚠️ Harap simpan username ini. Anda tidak dapat login tanpa username.
                        </p>
                    </div>

                    <a href="{{ route('login') }}" class="w-full inline-flex justify-center items-center gap-2 py-3 px-4 border border-transparent shadow-lg shadow-primary/25 rounded-xl text-sm font-medium text-white bg-primary hover:bg-primary-hover transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Ke Halaman Login
                    </a>
                </div>
                @endsection