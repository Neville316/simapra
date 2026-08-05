<?php

namespace Database\Seeders;

use App\Enums\StatusLogbook;
use App\Enums\StatusPengajuan;
use App\Models\Fasilitas;
use App\Models\Instansi;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use App\Models\MahasiswaFasilitas;
use App\Models\PembimbingInstansi;
use App\Models\PengajuanPkl;
use App\Models\PenempatanPkl;
use App\Models\PeriodePkl;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SimapraMasterSeeder extends Seeder
{
    public function run(): void
    {
        // Nonaktifkan pengecekan foreign key agar truncate aman
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan semua tabel
        Logbook::truncate();
        MahasiswaFasilitas::truncate();
        PenempatanPkl::truncate();
        PengajuanPkl::truncate();
        Mahasiswa::truncate();
        PembimbingInstansi::truncate();
        Instansi::truncate();
        PeriodePkl::truncate();
        Fasilitas::truncate();
        User::truncate();
        Role::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $userService = app(UserService::class);

        // 1. ROLES
        $roleAdmin = Role::create(['name' => 'admin', 'description' => 'Administrator HRD ENBI Group']);
        $roleMahasiswa = Role::create(['name' => 'mahasiswa', 'description' => 'Mahasiswa Peserta PKL']);
        $rolePembimbing = Role::create(['name' => 'pembimbing', 'description' => 'Pembimbing Instansi Mitra']);

        // 2. USER ADMIN
        User::create([
            'role_id' => $roleAdmin->id,
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@enbigroup.com',
            'password' => Hash::make('password'),
            'status' => 1,
        ]);

        // 3. MASTER DATA INSTANSI (9 Data)
        $instansiList = [
            ['nama_instansi' => 'PT ENBI Digital', 'kota' => 'Jakarta', 'bidang_usaha' => 'IT', 'status_aktif' => 1],
            ['nama_instansi' => 'PT ENBI Academy', 'kota' => 'Bandung', 'bidang_usaha' => 'Pendidikan', 'status_aktif' => 1],
            ['nama_instansi' => 'PT ENBI Media', 'kota' => 'Surabaya', 'bidang_usaha' => 'Kreatif', 'status_aktif' => 1],
            ['nama_instansi' => 'PT Teknologi Jaya', 'kota' => 'Yogyakarta', 'bidang_usaha' => 'IT', 'status_aktif' => 1],
            ['nama_instansi' => 'CV Bintang Terang', 'kota' => 'Semarang', 'bidang_usaha' => 'Retail', 'status_aktif' => 1],
            ['nama_instansi' => 'Dinas Komunikasi', 'kota' => 'Jakarta', 'bidang_usaha' => 'Pemerintahan', 'status_aktif' => 1],
            ['nama_instansi' => 'PT Maju Bersama', 'kota' => 'Surabaya', 'bidang_usaha' => 'Manufaktur', 'status_aktif' => 1],
            ['nama_instansi' => 'CV Karya Cipta', 'kota' => 'Bandung', 'bidang_usaha' => 'Desain', 'status_aktif' => 1],
            ['nama_instansi' => 'Kementerian Kominfo', 'kota' => 'Jakarta', 'bidang_usaha' => 'Pemerintahan', 'status_aktif' => 1],
        ];

        foreach ($instansiList as $inst) {
            Instansi::create($inst);
        }

        // 4. PERIODE PKL
        PeriodePkl::create(['nama_periode' => 'Ganjil 2024/2025', 'tanggal_mulai' => '2024-09-01', 'tanggal_selesai' => '2024-12-31', 'status' => 1]);

        // 5. FASILITAS (Berdasarkan guidefix.md)
        $fasilitasList = [
            'Transportasi',
            'Konsumsi',
            'Seragam',
            'Sertifikat',
            'Akses Sistem',
            'Ruang Kerja',
            'Pembimbing Lapangan',
            'Uang Saku',
        ];

        foreach ($fasilitasList as $fasilitas) {
            Fasilitas::create(['nama_fasilitas' => $fasilitas]);
        }
    }
}