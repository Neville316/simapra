@extends('layouts.app')

@section('title', 'Riwayat Aktivitas')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Riwayat Aktivitas</h1>
            <p class="text-sm text-gray-500 mt-1">Pantau aktivitas akun dan sistem Anda</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden p-6 md:p-8">
        @if($logs->isEmpty())
            <div class="flex flex-col items-center justify-center py-12 text-gray-500">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-700">Belum Ada Riwayat</h3>
                <p class="text-sm mt-1 text-gray-500">Aktivitas yang Anda lakukan akan muncul di sini.</p>
            </div>
        @else
            <div class="relative max-w-4xl mx-auto">
                <!-- Vertical Line -->
                <div class="absolute top-0 bottom-0 left-8 md:left-24 w-0.5 bg-gray-200"></div>

                <div class="space-y-8 relative z-0">
                    @foreach($logs as $log)
                        @php
                            $actionConfig = match($log->action) {
                                'created' => [
                                    'color' => 'bg-emerald-500', 
                                    'bg' => 'bg-emerald-50',
                                    'text' => 'text-emerald-700',
                                    'border' => 'border-emerald-200',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>'
                                ],
                                'updated' => [
                                    'color' => 'bg-blue-500', 
                                    'bg' => 'bg-blue-50',
                                    'text' => 'text-blue-700',
                                    'border' => 'border-blue-200',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>'
                                ],
                                'deleted' => [
                                    'color' => 'bg-red-500', 
                                    'bg' => 'bg-red-50',
                                    'text' => 'text-red-700',
                                    'border' => 'border-red-200',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>'
                                ],
                                'login' => [
                                    'color' => 'bg-purple-500',
                                    'bg' => 'bg-purple-50',
                                    'text' => 'text-purple-700',
                                    'border' => 'border-purple-200',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>'
                                ],
                                'logout' => [
                                    'color' => 'bg-orange-500',
                                    'bg' => 'bg-orange-50',
                                    'text' => 'text-orange-700',
                                    'border' => 'border-orange-200',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>'
                                ],
                                default => [
                                    'color' => 'bg-gray-500', 
                                    'bg' => 'bg-gray-100',
                                    'text' => 'text-gray-700',
                                    'border' => 'border-gray-200',
                                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                                ],
                            };
                        @endphp
                        <div class="relative flex items-start group">
                            <!-- Time -->
                            <div class="hidden md:block w-24 pt-1 pr-6 text-right">
                                <div class="text-sm font-bold text-gray-800">{{ $log->created_at->format('H:i') }}</div>
                                <div class="text-xs font-medium text-gray-500">{{ $log->created_at->format('d M') }}</div>
                            </div>
                            
                            <!-- Timeline Dot / Icon -->
                            <div class="absolute left-8 md:static md:left-auto flex-shrink-0 w-8 h-8 rounded-full border-4 border-white flex items-center justify-center {{ $actionConfig['bg'] }} {{ $actionConfig['text'] }} shadow-sm -translate-x-4 md:-translate-x-0 group-hover:scale-110 transition-transform duration-200 z-10">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $actionConfig['icon'] !!}
                                </svg>
                            </div>
                            
                            <!-- Content -->
                            <div class="ml-12 md:ml-6 flex-1 pt-1 pb-2">
                                <div class="p-4 rounded-xl border border-gray-100 bg-gray-50 group-hover:border-gray-200 group-hover:bg-white group-hover:shadow-sm transition-all duration-300">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-2">
                                        <div class="flex items-center gap-2">
                                            <span class="px-2.5 py-0.5 text-xs font-bold rounded-md uppercase tracking-wider {{ $actionConfig['bg'] }} {{ $actionConfig['text'] }} {{ $actionConfig['border'] }} border">
                                                {{ $log->action }}
                                            </span>
                                            <span class="md:hidden text-xs font-medium text-gray-400 flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                {{ $log->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        
                                        @if(auth()->user()->isAdmin())
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center text-xs font-bold text-blue-700">
                                                {{ strtoupper(substr($log->user->name ?? '?', 0, 1)) }}
                                            </div>
                                            <span class="text-sm font-semibold text-gray-700">{{ $log->user->name ?? 'User Dihapus' }}</span>
                                            <span class="text-xs font-medium text-gray-400">({{ ucfirst($log->user->role->name ?? '-') }})</span>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <p class="text-gray-700 text-sm leading-relaxed mt-1">
                                        {{ $log->description }}
                                    </p>
                                    
                                    @if($log->model_type)
                                    <div class="mt-3 text-xs font-medium text-gray-500 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        ID Referensi: <span class="font-mono bg-gray-200 px-1.5 py-0.5 rounded text-gray-600">{{ $log->model_id }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Pagination -->
            @if($logs->hasPages())
            <div class="mt-8 pt-6 border-t border-gray-200">
                {{ $logs->links() }}
            </div>
            @endif
        @endif
    </div>
</div>
@endsection
