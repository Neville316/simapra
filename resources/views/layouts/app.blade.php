<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SIMAPRA - ENBI Group')</title>
    @vite(['resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', 'Segoe UI', system-ui, sans-serif; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 8px; }
        ::-webkit-scrollbar-thumb { background: #c1c7cd; border-radius: 8px; }
        ::-webkit-scrollbar-thumb:hover { background: #a0a7ae; }
    </style>
</head>
<body class="bg-gray-50/80 h-full flex">

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- Header -->
        <x-header :title="$header_title ?? 'Dashboard'" />

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50/80">
            <div class="animate-fade-in">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <x-footer />
    </div>

    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>