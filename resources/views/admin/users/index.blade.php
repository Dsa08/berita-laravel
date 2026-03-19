<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border">
                <div class="p-6 text-gray-900">
                    
                    {{-- Alert Success --}}
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-100">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role Saat Ini</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Ubah Role</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $user)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $user->role == 'admin' ? 'bg-red-100 text-red-800' : ($user->role == 'editor' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        {{-- Proteksi ID: Admin tidak bisa turun pangkat sendiri --}}
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <select name="role" onchange="this.form.submit()" 
                                                    class="text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                    <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                </select>
                                            </form>
                                        @else
                                            <span class="text-xs text-gray-400 italic">Kamu (Admin Utama)</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data user.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>