<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Register User</h2>

        <!-- Tampilkan pesan sukses -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.register') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus />
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required />
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="mt-6 flex justify-between">
                <a href="/" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Kembali</a>
                <x-primary-button>
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
