<nav x-data="{ open: false }" class="bg-gray-900 border-b border-red-700 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="text-xl font-bold text-red-500 tracking-wider mr-8">
                    🎌 AniNews
                </a>

                {{-- Nav Links --}}
                <div class="hidden sm:flex sm:space-x-2">
                    <a href="{{ route('dashboard') }}"
                        class="px-3 py-2 rounded text-sm font-medium transition
                        {{ request()->routeIs('dashboard') ? 'bg-red-700 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('posts.index') }}"
                        class="px-3 py-2 rounded text-sm font-medium transition
                        {{ request()->routeIs('posts.*') ? 'bg-red-700 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                        📰 Kelola Berita
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('users.index') }}"
                            class="px-3 py-2 rounded text-sm font-medium transition
                            {{ request()->routeIs('users.*') ? 'bg-red-700 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                            👥 Kelola User
                        </a>
                    @endif
                    <a href="{{ route('home') }}" target="_blank"
                        class="px-3 py-2 rounded text-sm font-medium text-gray-400 hover:bg-gray-800 hover:text-white transition">
                        🌐 Lihat Web
                    </a>
                </div>
            </div>

            {{-- User Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="inline-flex items-center px-3 py-2 border border-gray-700 rounded-md text-sm text-gray-300 bg-gray-800 hover:bg-gray-700 transition">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <span class="text-xs px-1.5 py-0.5 rounded
                            {{ Auth::user()->role === 'admin' ? 'bg-red-700 text-white' : (Auth::user()->role === 'editor' ? 'bg-blue-700 text-white' : 'bg-gray-600 text-gray-200') }}">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                            ⚙️ Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-700 hover:text-red-300">
                                🚪 Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Hamburger --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-gray-900 border-t border-gray-700">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded text-sm text-gray-300 hover:bg-gray-800">Dashboard</a>
            <a href="{{ route('posts.index') }}" class="block px-3 py-2 rounded text-sm text-gray-300 hover:bg-gray-800">📰 Kelola Berita</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded text-sm text-gray-300 hover:bg-gray-800">👥 Kelola User</a>
            @endif
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded text-sm text-gray-300 hover:bg-gray-800">🌐 Lihat Web</a>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3 px-4">
            <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded text-sm text-gray-300 hover:bg-gray-800">⚙️ Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 rounded text-sm text-red-400 hover:bg-gray-800">
                        🚪 Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>