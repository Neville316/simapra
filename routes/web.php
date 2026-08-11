<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Mahasiswa;
use App\Http\Controllers\Pembimbing;

Route::get('/register-success', [AuthController::class, 'showRegisterSuccess'])->name('register.success');

// Routes Guest
Route::middleware('guest')->group(function () {
    Route::get('/', fn() => redirect()->route('login'));

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// Routes Authenticated
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route Notifikasi
    Route::post('/notifications/read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('notifications.read');
  
    // Route Activity Log
    Route::get('/activity-log', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activity-log.index');
    
    // Khusus Admin
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        
        // Master Data Routes
        Route::resource('instansi', Admin\InstansiController::class);
        Route::resource('periode', Admin\PeriodePklController::class);
        Route::resource('fasilitas', Admin\FasilitasController::class)->parameter('fasilitas', 'fasilitas');
        
        // Verifikasi Pengajuan
        Route::get('/pengajuan', [Admin\PengajuanController::class, 'index'])->name('pengajuan.index');
        Route::post('/pengajuan/{pengajuan}/verify', [Admin\PengajuanController::class, 'verify'])->name('pengajuan.verify');
        
        // Penempatan PKL
        Route::get('/penempatan', [Admin\PenempatanController::class, 'index'])->name('penempatan.index');
        Route::get('/penempatan/{pengajuan}/create', [Admin\PenempatanController::class, 'create'])->name('penempatan.create');
        Route::post('/penempatan/{pengajuan}', [Admin\PenempatanController::class, 'store'])->name('penempatan.store');
        
        // Monitoring PKL
        Route::get('/monitoring', [Admin\MonitoringController::class, 'index'])->name('monitoring.index');
   
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('/laporan/export', [LaporanController::class, 'export'])->name('laporan.export');

        // Manajemen Mahasiswa & Pembimbing
        Route::resource('mahasiswa', Admin\MahasiswaController::class);
        Route::resource('pembimbing', Admin\PembimbingController::class);
    });

    // Khusus Mahasiswa
    Route::middleware('role:mahasiswa')->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'mahasiswa'])->name('dashboard');
        
        // Route Pengajuan PKL
        Route::resource('pengajuan', Mahasiswa\PengajuanController::class)->except(['edit', 'update', 'destroy']);
        
        // Route Logbook
        Route::resource('logbook', Mahasiswa\LogbookController::class)->except(['edit', 'update', 'destroy']);
    
        // Route Dokumen PKL
        Route::get('/dokumen', [Mahasiswa\DokumenController::class, 'index'])->name('dokumen.index');
        Route::post('/dokumen', [Mahasiswa\DokumenController::class, 'store'])->name('dokumen.store');
        Route::delete('/dokumen/{dokumen}', [Mahasiswa\DokumenController::class, 'destroy'])->name('dokumen.destroy');
    
        // Route Lihat Nilai
        Route::get('/penilaian', [Mahasiswa\PenilaianController::class, 'index'])->name('penilaian.index');
    });

    // Khusus Pembimbing
    Route::middleware('role:pembimbing')->prefix('pembimbing')->name('pembimbing.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'pembimbing'])->name('dashboard');
    
        // Route Mahasiswa Bimbingan
        Route::get('/mahasiswa', [Pembimbing\MahasiswaController::class, 'index'])->name('mahasiswa.index');
    
        // Route Validasi Logbook
        Route::get('/logbook', [Pembimbing\LogbookController::class, 'index'])->name('logbook.index');
        Route::post('/logbook/{logbook}/validate', [Pembimbing\LogbookController::class, 'validateLogbook'])->name('logbook.validate');
        // Route Penilaian
        Route::get('/penilaian', [Pembimbing\PenilaianController::class, 'index'])->name('penilaian.index');
        Route::get('/penilaian/{penempatan}/create', [Pembimbing\PenilaianController::class, 'create'])->name('penilaian.create');
        Route::post('/penilaian/{penempatan}', [Pembimbing\PenilaianController::class, 'store'])->name('penilaian.store');
    });
});