<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-gray-900 via-red-950 to-gray-900 border border-red-800 rounded-xl p-6 mb-8">
                <h3 class="text-2xl font-bold text-white">
                    Selamat datang, {{ Auth::user()->name }}! 👋
                </h3>
                <p class="text-gray-400 mt-1">
                    Kamu login sebagai
                    <span class="px-2 py-0.5 rounded text-xs font-bold
                        {{ Auth::user()->role === 'admin' ? 'bg-red-700 text-white' : (Auth::user()->role === 'editor' ? 'bg-blue-700 text-white' : 'bg-gray-600 text-gray-200') }}">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </p>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                    <p class="text-gray-400 text-sm">Total Berita</p>
                    <p class="text-3xl font-bold text-white mt-1">
                        {{ \App\Models\Post::count() }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">artikel tersimpan</p>
                </div>
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                    <p class="text-gray-400 text-sm">Published</p>
                    <p class="text-3xl font-bold text-green-400 mt-1">
                        {{ \App\Models\Post::where('status', 'published')->count() }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">berita tayang</p>
                </div>
                <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                    <p class="text-gray-400 text-sm">Draft</p>
                    <p class="text-3xl font-bold text-yellow-400 mt-1">
                        {{ \App\Models\Post::where('status', 'draft')->count() }}
                    </p>
                    <p class="text-xs text-gray-500 mt-1">belum tayang</p>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                <h4 class="text-white font-semibold mb-4">Quick Actions</h4>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('posts.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-lg transition">
                        ✏️ Tulis Berita Baru
                    </a>
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-semibold rounded-lg transition">
                        📋 Lihat Semua Berita
                    </a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('users.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-semibold rounded-lg transition">
                            👥 Kelola User
                        </a>
                    @endif
                    <a href="{{ route('home') }}" target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm font-semibold rounded-lg transition">
                        🌐 Lihat Web Publik
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>