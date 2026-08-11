<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAPRA - Login</title>
    @vite(['resources/css/app.css'])
    <style>
        .login-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        }
        .login-card {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .login-input {
            @apply w-full px-4 py-3 bg-gray-50/80 border border-gray-200 rounded-xl text-gray-700 placeholder:text-gray-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary focus:bg-white;
        }
        .login-input:hover {
            @apply bg-white;
        }
        .login-btn {
            @apply w-full bg-primary hover:bg-primary-hover text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.98] shadow-lg shadow-primary/25 hover:shadow-primary/40 focus:outline-none focus:ring-2 focus:ring-primary/40;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 login-gradient">

    <div class="w-full max-w-md animate-fade-in">
        <div class="login-card rounded-2xl shadow-2xl p-8 border-t-4 border-primary">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">SIMAPRA</h1>
                <p class="text-gray-500 text-sm mt-1">Sistem Informasi Manajemen PKL</p>
                <p class="text-xs text-gray-400 mt-0.5">HRD ENBI Group</p>
            </div>

            @if (session('success'))
                <div class="alert alert-success mb-4">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                    <div class="text-xs text-gray-600 mt-1">
                        <p><strong>Username:</strong> <span class="font-mono bg-gray-100 px-2 py-0.5 rounded">{{ session('registered_username') }}</span></p>
                        <p><strong>Password:</strong> <span class="font-mono bg-gray-100 px-2 py-0.5 rounded">{{ session('registered_password') }}</span></p>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="login-input" placeholder="Masukkan username" required autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="login-input" placeholder="Masukkan password" required>
                </div>

                <button type="submit" class="login-btn">
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    Masuk
                </button>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('register') }}" class="text-sm text-primary hover:text-primary-hover font-medium transition">
                    Belum punya akun? Daftar di sini (Mahasiswa)
                </a>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>