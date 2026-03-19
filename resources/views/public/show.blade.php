<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - AniNews</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #0d0d1a; color: #e2e8f0; }
        .prose-dark p { color: #cbd5e1; line-height: 1.8; margin-bottom: 1rem; }
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
    </nav>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Breadcrumb --}}
        <div class="text-sm text-gray-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-red-400">Home</a>
            <span class="mx-2">/</span>
            @if($post->category)
                <span class="text-red-400">{{ $post->category->name }}</span>
                <span class="mx-2">/</span>
            @endif
            <span class="text-gray-300">{{ Str::limit($post->title, 50) }}</span>
        </div>

        {{-- Kategori --}}
        @if($post->category)
            <span class="bg-red-600 text-white text-xs font-bold px-3 py-1 rounded">
                {{ $post->category->name }}
            </span>
        @endif

        {{-- Judul --}}
        <h1 class="text-3xl font-bold text-white mt-4 leading-tight">
            {{ $post->title }}
        </h1>

        {{-- Meta --}}
        <div class="flex items-center space-x-4 mt-4 text-gray-400 text-sm border-b border-gray-700 pb-4">
            <span>✍️ {{ $post->author ?? 'Admin' }}</span>
            <span>📅 {{ $post->created_at->format('d M Y') }}</span>
            <span>🕒 {{ $post->created_at->diffForHumans() }}</span>
        </div>

        {{-- Thumbnail --}}
        @if($post->thumbnail)
            <img src="{{ asset('storage/'.$post->thumbnail) }}" 
                class="w-full rounded-xl mt-6 shadow-lg object-cover max-h-96">
        @endif

        {{-- Tags --}}
        @if($post->tags->count() > 0)
            <div class="flex flex-wrap gap-2 mt-4">
                @foreach($post->tags as $tag)
                    <span class="bg-gray-700 text-gray-300 text-xs px-2 py-1 rounded-full"># {{ $tag->name }}</span>
                @endforeach
            </div>
        @endif

        {{-- Konten --}}
        <div class="prose-dark mt-8">
            {!! nl2br(e($post->content)) !!}
        </div>

        {{-- Berita Terkait --}}
        @if($relatedPosts->count() > 0)
            <div class="mt-16">
                <div class="flex items-center mb-6">
                    <span class="w-1 h-6 bg-red-500 rounded mr-3"></span>
                    <h2 class="text-xl font-bold text-white">Berita Terkait</h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($relatedPosts as $related)
                        <a href="{{ route('news.show', $related) }}" 
                            class="bg-gray-800 rounded-lg overflow-hidden hover:ring-1 hover:ring-red-500 transition group">
                            @if($related->thumbnail)
                                <img src="{{ asset('storage/'.$related->thumbnail) }}" class="w-full h-28 object-cover">
                            @else
                                <div class="w-full h-28 bg-gray-700 flex items-center justify-center">
                                    <span class="text-3xl">📰</span>
                                </div>
                            @endif
                            <div class="p-3">
                                <p class="text-white text-xs font-semibold leading-snug group-hover:text-red-400 transition line-clamp-2">
                                    {{ $related->title }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Kembali --}}
        <div class="mt-10">
            <a href="{{ route('home') }}" class="inline-flex items-center text-red-400 hover:text-red-300 transition">
                ← Kembali ke Beranda
            </a>
        </div>

    </div>

    {{-- Footer --}}
    <footer class="bg-gray-900 border-t border-gray-700 mt-16 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-400 text-sm">
            <p class="text-red-500 font-bold text-lg mb-2">🎌 AniNews</p>
            <p>© {{ date('Y') }} AniNews — Media Berita Anime & Manga Indonesia</p>
        </div>
    </footer>

</body>
</html>