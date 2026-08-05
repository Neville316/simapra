<header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 shrink-0 border-b border-gray-200">
    <div class="flex items-center">
        <h1 class="text-lg font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>
    </div>

    <div class="flex items-center space-x-4">
        
        <!-- NOTIFIKASI (AlpineJS Dropdown) -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="text-gray-500 hover:text-gray-700 relative">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                
                @if(auth()->user()->unreadNotifications->count() > 0)
                <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
                @endif
            </button>

            <!-- Dropdown Panel -->
            <div x-show="open" @click.outside="open = false" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border z-50 overflow-hidden">
                
                <div class="bg-gray-50 px-4 py-3 border-b font-bold text-gray-700 flex justify-between items-center">
                    <span>Notifikasi</span>
                    <a href="#" class="text-xs text-blue-500 hover:underline" onclick="document.getElementById('markReadForm').submit()">Tandai dibaca</a>
                </div>

                <div class="max-h-96 overflow-y-auto divide-y">
                    @forelse(auth()->user()->notifications->take(5) as $notif)
                    <div class="p-3 text-sm hover:bg-gray-50 {{ $notif->read_at ? 'text-gray-400' : 'text-gray-800 font-semibold' }}">
                        <p class="text-xs uppercase {{ $notif->data['type'] == 'success' ? 'text-green-500' : ($notif->data['type'] == 'danger' ? 'text-red-500' : 'text-blue-500') }}">{{ $notif->data['title'] }}</p>
                        <p>{{ $notif->data['message'] }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                    </div>
                    @empty
                    <div class="p-6 text-center text-gray-500 text-sm">Tidak ada notifikasi.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="flex items-center space-x-3 border-l pl-4">
            <div class="text-right">
                <div class="text-sm font-semibold text-gray-700">{{ auth()->user()->name }}</div>
                <div class="text-xs text-gray-500 uppercase">{{ auth()->user()->role->name }}</div>
            </div>
            <div class="w-9 h-9 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold uppercase">
                {{ substr(auth()->user()->name, 0, 1) }}
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-full transition" title="Logout">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
        </form>
    </div>
</header>

<!-- Form tersembunyi untuk mark as read -->
<form id="markReadForm" action="{{ route('notifications.read') }}" method="POST" class="hidden">
    @csrf
</form>