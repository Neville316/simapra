<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;

class UserService
{
    /**
     * Generate username unik untuk Mahasiswa.
     * Format: Inisial Nama + 2 Angka Terakhir NIM + 3 Angka Acak
     * Contoh: Budi Santoso, NIM: 2021001234 -> BS34123
     */
    public function generateUsernameMahasiswa(string $name, string $nim): string
    {
        // 1. Ambil inisial nama (huruf pertama setiap kata, uppercase)
        $nameParts = explode(' ', trim($name));
        $initials = '';
        foreach ($nameParts as $part) {
            $initials .= strtoupper(Str::substr($part, 0, 1));
        }
        
        // 2. Ambil 2 angka terakhir dari NIM
        $lastTwoNim = Str::substr($nim, -2);
        
        // 3. Generate 3 angka acak
        $randomNumbers = str_pad((string)rand(0, 999), 3, '0', STR_PAD_LEFT);
        
        // Gabungkan
        $username = $initials . $lastTwoNim . $randomNumbers;
        
        // 4. Pastikan unik di database (rekursif jika sudah ada)
        if (User::where('username', $username)->exists()) {
            return $this->generateUsernameMahasiswa($name, $nim);
        }
        
        return $username;
    }

    /**
     * Registrasi Mahasiswa baru
     */
    public function registerMahasiswa(array $data): User
    {
        $roleMahasiswa = Role::where('name', 'mahasiswa')->first();

        $username = $this->generateUsernameMahasiswa($data['name'], $data['nim']);

        $user = User::create([
            'role_id' => $roleMahasiswa->id,
            'name' => $data['name'],
            'username' => $username,
            'email' => $data['email'],
            'password' => $data['password'],
            'status' => 1, // Langsung aktif
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $data['nim'],
            'program_studi' => $data['program_studi'] ?? null,
            'angkatan' => $data['angkatan'] ?? null,
        ]);

        return $user;
    }
}