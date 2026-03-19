<x-guest-layout>
    <h2 class="text-xl font-bold text-white text-center mb-6">Daftar Akun AniNews</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Nama</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="Nama lengkap" required autofocus>
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="contoh@email.com" required>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="••••••••" required>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="••••••••" required>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-400 text-sm" />
        </div>

        <button type="submit"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition duration-150">
            Daftar
        </button>

        <p class="text-center text-sm text-gray-500 mt-4">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300">Login di sini</a>
        </p>
    </form>
</x-guest-layout>