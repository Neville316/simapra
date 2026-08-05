<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Mahasiswa::with('user');

        if ($request->filled('search')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            })->orWhere('nim', 'like', '%' . $request->search . '%');
        }

        $mahasiswa = $query->latest()->paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'program_studi' => 'nullable|string',
            'angkatan' => 'nullable|digits:4',
        ]);

        $roleMahasiswa = Role::where('name', 'mahasiswa')->first();

        $user = User::create([
            'role_id' => $roleMahasiswa->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'status' => 1,
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'] ?? null,
            'angkatan' => $validated['angkatan'] ?? null,
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user_id,
            'username' => 'required|string|unique:users,username,' . $mahasiswa->user_id,
            'password' => 'nullable|string|min:8',
            'nim' => 'required|string|unique:mahasiswa,nim,' . $mahasiswa->id,
            'program_studi' => 'nullable|string',
            'angkatan' => 'nullable|digits:4',
        ]);

        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
        ];

        if (!empty($validated['password'])) {
            $userData['password'] = Hash::make($validated['password']);
        }

        $mahasiswa->user->update($userData);
        $mahasiswa->update([
            'nim' => $validated['nim'],
            'program_studi' => $validated['program_studi'] ?? null,
            'angkatan' => $validated['angkatan'] ?? null,
        ]);

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->user->delete(); // Soft delete user
        $mahasiswa->delete(); // Soft delete mahasiswa
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}