<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\PembimbingInstansi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembimbingController extends Controller
{
    public function index(Request $request)
    {
        $query = PembimbingInstansi::with(['user', 'instansi']);

        if ($request->filled('search')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $pembimbing = $query->latest()->paginate(10);
        return view('admin.pembimbing.index', compact('pembimbing'));
    }

    public function create()
    {
        $instansi = Instansi::where('status_aktif', 1)->get();
        return view('admin.pembimbing.create', compact('instansi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
            'instansi_id' => 'required|exists:instansi,id',
            'nip' => 'nullable|string',
            'jabatan' => 'nullable|string',
        ]);

        $rolePembimbing = Role::where('name', 'pembimbing')->first();

        $user = User::create([
            'role_id' => $rolePembimbing->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'status' => 1,
        ]);

        PembimbingInstansi::create([
            'user_id' => $user->id,
            'instansi_id' => $validated['instansi_id'],
            'nip' => $validated['nip'] ?? null,
            'jabatan' => $validated['jabatan'] ?? null,
        ]);

        return redirect()->route('admin.pembimbing.index')->with('success', 'Data pembimbing berhasil ditambahkan.');
    }

    public function edit(PembimbingInstansi $pembimbing)
    {
        $instansi = Instansi::where('status_aktif', 1)->get();
        return view('admin.pembimbing.edit', compact('pembimbing', 'instansi'));
    }

    public function update(Request $request, PembimbingInstansi $pembimbing)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $pembimbing->user_id,
            'username' => 'required|string|unique:users,username,' . $pembimbing->user_id,
            'password' => 'nullable|string|min:8',
            'instansi_id' => 'required|exists:instansi,id',
            'nip' => 'nullable|string',
            'jabatan' => 'nullable|string',
        ]);

        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'username' => $validated['username'],
        ];

        if (!empty($validated['password'])) {
            $userData['password'] = Hash::make($validated['password']);
        }

        $pembimbing->user->update($userData);
        $pembimbing->update([
            'instansi_id' => $validated['instansi_id'],
            'nip' => $validated['nip'] ?? null,
            'jabatan' => $validated['jabatan'] ?? null,
        ]);

        return redirect()->route('admin.pembimbing.index')->with('success', 'Data pembimbing berhasil diperbarui.');
    }

    public function destroy(PembimbingInstansi $pembimbing)
    {
        $pembimbing->user->delete();
        $pembimbing->delete();
        return redirect()->route('admin.pembimbing.index')->with('success', 'Data pembimbing berhasil dihapus.');
    }
}