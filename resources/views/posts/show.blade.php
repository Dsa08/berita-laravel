<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                {{-- Thumbnail --}}
                @if($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}"
                         alt="{{ $post->title }}"
                         class="w-full h-96 object-cover">
                @endif

                <div class="p-8 text-gray-900">
                    {{-- Judul --}}
                    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>

                    {{-- Info Tambahan --}}
                    <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4 mb-6 border-b pb-4">
                        <span>Oleh <span class="font-semibold text-gray-700">{{ $post->author ?? 'Admin' }}</span></span>
                        <span>|</span>
                        <span>{{ $post->created_at->format('d F Y') }}</span>
                        
                        @if($post->category)
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-semibold">
                                {{ $post->category->name }}
                            </span>
                        @endif
                    </div>

                    {{-- Isi Berita --}}
                    <div class="prose max-w-none text-gray-700 leading-relaxed text-lg">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    {{-- Tag --}}
                    @if($post->tags->count() > 0)
                        <div class="mt-8 pt-6 border-t">
                            <p class="text-sm font-semibold text-gray-600 mb-2">TAGS:</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded hover:bg-gray-200 transition">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Tombol Kembali --}}
                    <div class="mt-10">
                        <a href="{{ route('posts.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            &larr; Kembali ke Daftar Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>