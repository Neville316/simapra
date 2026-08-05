<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login dengan Throttle (3x salah = kunci 5 menit)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $key = 'login.' . $request->ip();

        // Cek jika IP ini sudah melebihi batas percobaan
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                'username' => "Terlalu banyak percobaan login. Akun Anda dibekukan sementara. Coba lagi dalam {$seconds} detik.",
            ]);
        }

        // Coba autentikasi
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            RateLimiter::clear($key); // Hapus hitungan gagal jika berhasil

            // Redirect berdasarkan role
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->isPembimbing()) {
                return redirect()->intended('/pembimbing/dashboard');
            }
            return redirect()->intended('/mahasiswa/dashboard');
        }

        // Jika gagal, tambah hitungan rate limiter
        RateLimiter::hit($key, 300); // 300 detik = 5 menit

        throw ValidationException::withMessages([
            'username' => 'Username atau password yang Anda masukkan salah.',
        ]);
    }

    // Tampilkan form register mahasiswa
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register mahasiswa
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'nim' => 'required|string|unique:mahasiswa,nim',
            'program_studi' => 'nullable|string|max:100',
            'angkatan' => 'nullable|digits:4',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $this->userService->registerMahasiswa($validated);

        // Arahkan kembali ke login dengan membawa data kredensial
        return redirect()->route('login')->with([
            'success' => 'Registrasi berhasil!',
            'registered_username' => $user->username,
            'registered_password' => $validated['password']
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}