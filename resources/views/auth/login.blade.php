<x-guest-layout>
    <h2 class="text-xl font-bold text-white text-center mb-6">Login ke AniNews</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="contoh@email.com" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="••••••••" required>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center text-sm text-gray-400">
                <input type="checkbox" name="remember" class="rounded border-gray-600 bg-gray-800 text-red-600 mr-2">
                Ingat saya
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-red-400 hover:text-red-300">
                    Lupa password?
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition duration-150">
            Login
        </button>

        <p class="text-center text-sm text-gray-500 mt-4">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-red-400 hover:text-red-300">Daftar di sini</a>
        </p>
    </form>
</x-guest-layout>