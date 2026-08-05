<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAPRA - Login</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-md p-8 border-t-4 border-blue-600">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">SIMAPRA</h1>
                <p class="text-gray-500">Sistem Informasi Manajemen PKL</p>
                <p class="text-sm text-gray-400 mt-1">HRD ENBI Group</p>
            </div>

            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded mb-4" role="alert">
                    <p class="font-bold mb-2">{{ session('success') }}</p>
                    <p class="text-sm mb-2">Berikut adalah kredensial akun Anda. Silakan login menggunakan data di bawah ini:</p>
                    <div class="bg-white p-3 rounded border border-green-200 text-gray-800 text-sm">
                        <p><strong>Username:</strong> <span class="font-mono bg-gray-100 px-2 py-0.5 rounded">{{ session('registered_username') }}</span></p>
                        <p class="mt-1"><strong>Password:</strong> <span class="font-mono bg-gray-100 px-2 py-0.5 rounded">{{ session('registered_password') }}</span></p>
                    </div>
                    <p class="text-xs text-gray-500 italic mt-2">* Simpan kredensial ini dengan baik.</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" placeholder="Masukkan username" required autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500" placeholder="Masukkan password" required>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full focus:outline-none focus:shadow-outline transition duration-300">
                        Masuk
                    </button>
                </div>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:text-blue-800">Belum punya akun? Daftar di sini (Mahasiswa)</a>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>