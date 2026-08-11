@props(['title' => 'Dashboard'])

<header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 shrink-0 border-b border-gray-200">
    <div class="flex items-center gap-3">
        <h1 class="text-xl font-semibold text-gray-800">{{ $title }}</h1>
        <!-- Breadcrumb sederhana -->
        <span class="hidden sm:inline text-xs text-gray-400">/ {{ request()->route()->getName() }}</span>
    </div>

    <div class="flex items-center gap-3">
        
        <!-- REALTIME CLOCK (AlpineJS) -->
        <div x-data="{ 
                time: '', 
                updateTime() { 
                    this.time = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) 
                }
            }" 
            x-init="updateTime(); setInterval(() => updateTime(), 1000)" 
            class="hidden sm:flex items-center gap-2 text-sm font-medium text-gray-600 bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-200">
            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span x-text="time"></span>
        </div>

        <!-- NOTIFIKASI (AlpineJS Dropdown) -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                
                @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-danger rounded-full ring-2 ring-white"></span>
                @endif
            </button>

            <!-- Dropdown Panel -->
            <div x-show="open" @click.outside="open = false" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-100 z-50 overflow-hidden">
                
                <div class="bg-gray-50/80 px-4 py-3 border-b border-gray-100 font-semibold text-gray-700 flex justify-between items-center">
                    <span>Notifikasi</span>
                    <button onclick="document.getElementById('markReadForm').submit()" class="text-xs text-primary hover:text-primary-hover font-medium transition">
                        Tandai dibaca
                    </button>
                </div>

                <div class="max-h-96 overflow-y-auto divide-y divide-gray-100">
                    @forelse(auth()->user()->notifications->take(5) as $notif)
                    <div class="p-3 text-sm hover:bg-gray-50/60 transition {{ $notif->read_at ? 'text-gray-400' : 'text-gray-800 font-medium' }}">
                        <p class="text-xs font-bold uppercase {{ $notif->data['type'] == 'success' ? 'text-success' : ($notif->data['type'] == 'danger' ? 'text-danger' : 'text-primary') }}">
                            {{ $notif->data['title'] }}
                        </p>
                        <p class="mt-0.5">{{ $notif->data['message'] }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                    </div>
                    @empty
                    <div class="p-6 text-center text-gray-400 text-sm">
                        <svg class="w-10 h-10 mx-auto text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        Tidak ada notifikasi.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="flex items-center gap-3 border-l border-gray-200 pl-3">
            <div class="text-right hidden sm:block">
                <div class="text-sm font-semibold text-gray-700">{{ auth()->user()->name }}</div>
                <div class="text-xs text-gray-400 uppercase">{{ auth()->user()->role->name }}</div>
            </div>
            <div class="w-9 h-9 bg-gradient-to-br from-primary to-primary-hover rounded-xl flex items-center justify-center text-white font-bold text-sm shadow-sm">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="p-2 text-gray-400 hover:text-danger hover:bg-red-50 rounded-lg transition" title="Logout">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
        </form>
    </div>
</header>

<!-- Form tersembunyi untuk mark as read -->
<form id="markReadForm" action="{{ route('notifications.read') }}" method="POST" class="hidden">
    @csrf
</form>