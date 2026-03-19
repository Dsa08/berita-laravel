<x-guest-layout>
    <h2 class="text-xl font-bold text-white text-center mb-2">Verifikasi Email</h2>

    <p class="text-gray-400 text-sm text-center mb-6">
        Terima kasih sudah mendaftar! Sebelum mulai, harap verifikasi email kamu
        dengan klik link yang sudah kami kirimkan. Cek folder spam jika tidak ada di inbox.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 bg-green-900 border border-green-700 text-green-300 text-sm px-4 py-3 rounded-lg text-center">
            Link verifikasi baru sudah dikirim ke email kamu!
        </div>
    @endif

    <div class="flex flex-col gap-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-2.5 rounded-lg transition duration-150">
                Kirim Ulang Link Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full bg-gray-700 hover:bg-gray-600 text-gray-300 font-semibold py-2.5 rounded-lg transition duration-150">
                Log Out
            </button>
        </form>
    </div>
</x-guest-layout>