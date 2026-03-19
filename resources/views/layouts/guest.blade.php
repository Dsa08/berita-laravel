<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AniNews') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #0d0d1a; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-color: #0d0d1a;">

        <div class="mb-6 text-center">
            <a href="/" class="text-3xl font-bold text-red-500 tracking-wider">🎌 AniNews</a>
            <p class="text-gray-500 text-sm mt-1">Media Berita Anime & Manga Indonesia</p>
        </div>

        <div class="w-full sm:max-w-md px-6 py-6 bg-gray-900 border border-gray-700 shadow-xl overflow-hidden sm:rounded-xl">
            {{ $slot }}
        </div>

        <div class="mt-4">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-red-400 transition">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>