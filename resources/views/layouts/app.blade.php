<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIMAPRA - ENBI Group')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 h-full flex">

    <!-- Panggil Komponen Sidebar -->
    <x-sidebar />

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- Panggil Komponen Header -->
        <x-header :title="$header_title ?? 'Dashboard'" />

        <!-- Page Content (Scrollable) -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>

        <!-- Panggil Komponen Footer -->
        <x-footer />
    </div>

    @vite(['resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
