<x-guest-layout>
    <div class="w-full max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-4 text-center">Form Pendaftaran</h2>

        <!-- Tampilkan pesan sukses -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('pendaftaran.store') }}">
            @csrf

            <div>
                <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required />
                @error('nama_lengkap') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="nisn" :value="__('NISN')" />
                <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" value="{{ old('nisn') }}" required />
                @error('nisn') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="tempat_lahir" :value="__('Tempat Lahir')" />
                <x-text-input id="tempat_lahir" class="block mt-1 w-full" type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required />
                @error('tempat_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
                <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required />
                @error('tanggal_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                <select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="asal_sekolah" :value="__('Asal Sekolah')" />
                <x-text-input id="asal_sekolah" class="block mt-1 w-full" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required />
                @error('asal_sekolah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="nomor_hp" :value="__('Nomor HP')" />
                <x-text-input id="nomor_hp" class="block mt-1 w-full" type="text" name="nomor_hp" value="{{ old('nomor_hp') }}" required />
                @error('nomor_hp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="nama_ayah" :value="__('Nama Ayah')" />
                <x-text-input id="nama_ayah" class="block mt-1 w-full" type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" required />
                @error('nama_ayah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="nama_ibu" :value="__('Nama Ibu')" />
                <x-text-input id="nama_ibu" class="block mt-1 w-full" type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" required />
                @error('nama_ibu') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="alamat_email" :value="__('Email')" />
                <x-text-input id="alamat_email" class="block mt-1 w-full" type="email" name="alamat_email" value="{{ old('alamat_email') }}" required />
                @error('alamat_email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="jurusan_pertama" :value="__('Jurusan 1')" />
                <x-text-input id="jurusan_pertama" class="block mt-1 w-full" type="text" name="jurusan_pertama" value="{{ old('jurusan_pertama') }}" required />
                @error('jurusan_pertama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="jurusan_kedua" :value="__('Jurusan 2')" />
                <x-text-input id="jurusan_kedua" class="block mt-1 w-full" type="text" name="jurusan_kedua" value="{{ old('jurusan_kedua') }}" />
                @error('jurusan_kedua') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-input-label for="jurusan_ketiga" :value="__('Jurusan 3')" />
                <x-text-input id="jurusan_ketiga" class="block mt-1 w-full" type="text" name="jurusan_ketiga" value="{{ old('jurusan_ketiga') }}" />
                @error('jurusan_ketiga') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mt-6 flex justify-between">
                <a href="/" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Kembali</a>
                <x-primary-button>
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
