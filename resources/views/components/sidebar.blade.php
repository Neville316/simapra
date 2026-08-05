@php
    $currentRoute = request()->route()->getName();
    $activeParent = explode('.', $currentRoute)[1] ?? '';
@endphp

<aside class="w-64 bg-sidebar text-gray-200 flex flex-col h-screen hidden md:flex">
    <div class="h-16 flex items-center justify-center border-b border-gray-700 shrink-0">
        <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white tracking-wide">SIMAPRA</a>
    </div>
    
    <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
        @if(auth()->user()->isAdmin())
            <!-- Menu Admin -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'dashboard' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            
            <div class="px-4 py-2 text-xs text-gray-400 uppercase tracking-wider mt-4 font-bold">Manajemen Pengguna</div>
            <a href="{{ route('admin.mahasiswa.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'mahasiswa' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Data Mahasiswa
            </a>
            <a href="{{ route('admin.pembimbing.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'pembimbing' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Data Pembimbing
            </a>

            <div class="px-4 py-2 text-xs text-gray-400 uppercase tracking-wider mt-4 font-bold">Master Data</div>
            <a href="{{ route('admin.instansi.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'instansi' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Data Instansi
            </a>
            <a href="{{ route('admin.periode.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'periode' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Periode PKL
            </a>
            <a href="{{ route('admin.fasilitas.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'fasilitas' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Fasilitas
            </a>

           <!-- Cari menu Verifikasi Pengajuan di bagian Admin -->
            <a href="{{ route('admin.pengajuan.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'pengajuan' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                Verifikasi Pengajuan
            </a>
            <a href="{{ route('admin.penempatan.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'penempatan' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Penempatan PKL
            </a>
            <a href="{{ route('admin.monitoring.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'monitoring' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Monitoring PKL
            <a href="{{ route('admin.laporan.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'laporan' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Laporan PKL
            </a>

        @elseif(auth()->user()->isMahasiswa())
            <!-- Menu Mahasiswa -->
            <a href="{{ route('mahasiswa.dashboard') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'dashboard' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <div class="px-4 py-2 text-xs text-gray-400 uppercase tracking-wider mt-4 font-bold">PKL Saya</div>
            <a href="{{ route('mahasiswa.pengajuan.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'pengajuan' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                Pengajuan PKL
            </a>
            <a href="{{ route('mahasiswa.logbook.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'logbook' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Logbook Harian
            </a>
            <!-- Cari bagian menu Mahasiswa, tambahkan ini setelah menu Logbook/Dokumen -->
            <a href="{{ route('mahasiswa.penilaian.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'penilaian' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                Nilai PKL
            </a>
            <a href="{{ route('mahasiswa.dokumen.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'dokumen' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                Upload Dokumen
            </a>

        @elseif(auth()->user()->isPembimbing())
            <!-- Menu Pembimbing -->
            <a href="{{ route('pembimbing.dashboard') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'dashboard' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <div class="px-4 py-2 text-xs text-gray-400 uppercase tracking-wider mt-4 font-bold">Bimbingan</div>
            <a href="{{ route('pembimbing.mahasiswa.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'mahasiswa' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Mahasiswa Bimbingan
            </a>
            <a href="{{ route('pembimbing.logbook.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'logbook' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Validasi Logbook
            </a>
            <a href="{{ route('pembimbing.penilaian.index') }}" class="flex items-center px-4 py-2.5 rounded {{ $activeParent == 'penilaian' ? 'bg-blue-600 text-white' : 'hover:bg-gray-700 transition' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                Input Penilaian
            </a>
        @endif
    </nav>
</aside>