<x-guest-layout>
    <h2 class="text-xl font-bold text-white text-center mb-2">Konfirmasi Password</h2>
    <p class="text-gray-400 text-sm text-center mb-6">
        Ini adalah area aman. Harap konfirmasi password kamu sebelum melanjutkan.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input id="password" type="password" name="password"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="••••••••" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400 text-sm" />
        </div>

        <button type="submit"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition duration-150">
            Konfirmasi
        </button>
    </form>
</x-guest-layout>