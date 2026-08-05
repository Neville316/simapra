<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAPRA - Daftar Mahasiswa</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-8">

    <div class="w-full max-w-lg">
        <div class="bg-white rounded-lg shadow-md p-8 border-t-4 border-green-600">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Pendaftaran Akun</h1>
                <p class="text-gray-500">Khusus Mahasiswa Peserta PKL</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                    <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500" required>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">NIM</label>
                        <input type="text" name="nim" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Angkatan</label>
                        <input type="text" name="angkatan" placeholder="2023" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Program Studi</label>
                    <input type="text" name="program_studi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500" required>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-green-500" required>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full focus:outline-none focus:shadow-outline transition duration-300">
                        Daftar Sekarang
                    </button>
                </div>
            </form>

            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-800">Sudah punya akun? Kembali ke Login</a>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])
</body>
</html>