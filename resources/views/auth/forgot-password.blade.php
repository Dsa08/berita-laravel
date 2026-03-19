<x-guest-layout>
    <h2 class="text-xl font-bold text-white text-center mb-2">Lupa Password?</h2>
    <p class="text-gray-400 text-sm text-center mb-6">
        Masukkan email kamu dan kami akan kirimkan link reset password.
    </p>

    <x-auth-session-status class="mb-4 text-green-400 text-sm" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="contoh@email.com" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-sm" />
        </div>

        <button type="submit"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition duration-150">
            Kirim Link Reset Password
        </button>

        <p class="text-center text-sm text-gray-500 mt-4">
            Ingat password?
            <a href="{{ route('login') }}" class="text-red-400 hover:text-red-300">Login di sini</a>
        </p>
    </form>
</x-guest-layout>