<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insert Roles
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Administrator HRD ENBI Group'
        ]);

        Role::create([
            'name' => 'mahasiswa',
            'description' => 'Mahasiswa Peserta PKL'
        ]);

        Role::create([
            'name' => 'pembimbing',
            'description' => 'Pembimbing Instansi Mitra'
        ]);

        // 2. Buat Akun Admin Default (agar bisa login)
        User::create([
            'role_id' => $adminRole->id,
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@enbigroup.com',
            'password' => Hash::make('password'), // Ganti password ini sesuai kebutuhan
            'status' => 1,
        ]);
    }
}