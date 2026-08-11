<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAPRA - Daftar Mahasiswa</title>
    @vite(['resources/css/app.css'])
    <style>
        .register-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        }
        .register-card {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .register-input {
            @apply w-full px-4 py-3 bg-gray-50/80 border border-gray-200 rounded-xl text-gray-700 placeholder:text-gray-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-success/30 focus:border-success focus:bg-white;
        }
        .register-input:hover {
            @apply bg-white;
        }
        .register-btn {
            @apply w-full bg-success hover:bg-green-600 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 transform hover:scale-[1.01] active:scale-[0.98] shadow-lg shadow-success/25 hover:shadow-success/40 focus:outline-none focus:ring-2 focus:ring-success/40;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 register-gradient">

    <div class="w-full max-w-lg animate-fade-in">
        <div class="register-card rounded-2xl shadow-2xl p-8 border-t-4 border-success">
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-success/10 rounded-2xl mb-3">
                    <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-800">Pendaftaran Akun</h1>
                <p class="text-gray-500 text-sm">Khusus Mahasiswa Peserta PKL</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="register-input" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="form-label">NIM <span class="text-danger">*</span></label>
                        <input type="text" name="nim" class="register-input" placeholder="Masukkan NIM" required>
                    </div>
                    <div>
                        <label class="form-label">Angkatan</label>
                        <input type="text" name="angkatan" class="register-input" placeholder="Contoh: 2023">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="program_studi" class="register-input" placeholder="Masukkan program studi">
                </div>

                <div class="mb-4">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="register-input" placeholder="Masukkan email aktif" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="register-input" placeholder="Buat password" required>
                    </div>
                    <div>
                        <label class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="register-input" placeholder="Ulangi password" required>
                    </div>
                </div>

                <button type="submit" class="register-btn">
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    Daftar Sekarang
                </button>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700 transition font-medium">
                    Sudah punya akun? Kembali ke Login
                </a>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>