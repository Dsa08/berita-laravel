<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniNews - Berita Anime & Manga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #0d0d1a; color: #e2e8f0; }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="bg-gray-900 border-b border-red-600 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-red-500 tracking-wider">
                    🎌 AniNews
                </a>
                <div class="flex items-center space-x-4">
                    @foreach($categories as $cat)
                        <a href="#" class="text-gray-300 hover:text-red-400 text-sm font-medium transition">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                    @auth
                        <a href="{{ route('posts.index') }}" class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-3 py-2 rounded transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold px-3 py-2 rounded transition">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero / Berita Utama --}}
    @if($posts->count() > 0)
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Featured Post --}}
        @php $featured = $posts->first(); @endphp
        <div class="mb-8">
            <a href="{{ route('news.show', $featured) }}" class="block relative rounded-xl overflow-hidden group">
                @if($featured->thumbnail)
                    <img src="{{ asset('storage/'.$featured->thumbnail) }}" 
                        class="w-full h-96 object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-96 bg-gray-800 flex items-center justify-center">
                        <span class="text-gray-500 text-6xl">📰</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6">
                    @if($featured->category)
                        <span class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded mb-2 inline-block">
                            {{ $featured->category->name }}
                        </span>
                    @endif
                    <h1 class="text-2xl md:text-3xl font-bold text-white mt-1 leading-tight">
                        {{ $featured->title }}
                    </h1>
                    <p class="text-gray-300 text-sm mt-2">
                        {{ $featured->author ?? 'Admin' }} · {{ $featured->created_at->diffForHumans() }}
                    </p>
                </div>
            </a>
        </div>

        {{-- Latest News Grid --}}
        <div class="mb-4 flex items-center">
            <span class="w-1 h-6 bg-red-500 rounded mr-3"></span>
            <h2 class="text-xl font-bold text-white">Berita Terbaru</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts->skip(1) as $post)
            <a href="{{ route('news.show', $post) }}" 
                class="bg-gray-800 rounded-xl overflow-hidden group hover:bg-gray-750 hover:ring-1 hover:ring-red-500 transition duration-300">
                @if($post->thumbnail)
                    <img src="{{ asset('storage/'.$post->thumbnail) }}" 
                        class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-500 text-4xl">📰</span>
                    </div>
                @endif
                <div class="p-4">
                    @if($post->category)
                        <span class="bg-red-900 text-red-300 text-xs font-semibold px-2 py-1 rounded">
                            {{ $post->category->name }}
                        </span>
                    @endif
                    <h3 class="text-white font-semibold mt-2 leading-snug group-hover:text-red-400 transition line-clamp-2">
                        {{ $post->title }}
                    </h3>
                    <p class="text-gray-400 text-xs mt-2">
                        {{ $post->author ?? 'Admin' }} · {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $posts->links() }}
        </div>

    </div>
    @else
    <div class="max-w-7xl mx-auto px-4 py-24 text-center">
        <p class="text-6xl mb-4">📰</p>
        <p class="text-gray-400 text-xl">Belum ada berita yang dipublish.</p>
    </div>
    @endif

    {{-- Footer --}}
    <footer class="bg-gray-900 border-t border-gray-700 mt-16 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-400 text-sm">
            <p class="text-red-500 font-bold text-lg mb-2">🎌 AniNews</p>
            <p>© {{ date('Y') }} AniNews — Media Berita Anime & Manga Indonesia</p>
        </div>
    </footer>

</body>
</html>