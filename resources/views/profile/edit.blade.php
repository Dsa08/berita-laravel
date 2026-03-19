<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            ⚙️ Profile
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- Update Info --}}
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                <h3 class="text-white font-semibold mb-4">Informasi Profil</h3>
                @include('profile.partials.update-profile-information-form')
            </div>

            {{-- Update Password --}}
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-6">
                <h3 class="text-white font-semibold mb-4">Ubah Password</h3>
                @include('profile.partials.update-password-form')
            </div>

            {{-- Delete Account --}}
            <div class="bg-gray-800 border border-red-900 rounded-xl p-6">
                <h3 class="text-red-400 font-semibold mb-4">Hapus Akun</h3>
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>