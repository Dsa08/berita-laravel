<x-guest-layout>
    <h2 class="text-xl font-bold text-white text-center mb-6">Reset Password</h2>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="contoh@email.com" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password Baru</label>
            <input id="password" type="password" name="password"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="••••••••" required>
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-400 text-sm" />
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password Baru</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                class="w-full px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500"
                placeholder="••••••••" required>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-400 text-sm" />
        </div>

        <button type="submit"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition duration-150">
            Reset Password
        </button>
    </form>
</x-guest-layout>