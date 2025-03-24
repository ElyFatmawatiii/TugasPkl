<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 text-white dark:bg-gray-800 dark:text-white">
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4 p-4 bg-white shadow dark:bg-gray-900" style="background-color: #2973B2; color: white;">
            @auth
                <a href="{{ url('/dashboard') }}" class="px-5 py-1.5 border border-gray-300 rounded-sm text-sm leading-normal dark:border-gray-700 dark:hover:border-gray-500 text-white">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="px-5 py-1.5 border border-transparent hover:border-gray-300 rounded-sm text-sm leading-normal dark:hover:border-gray-700 text-white">
                    Log in
                </a>
                
                @if (Route::has('user.register'))
                    <a href="{{ route('user.register') }}" class="px-5 py-1.5 border border-gray-300 rounded-sm text-sm leading-normal dark:border-gray-700 dark:hover:border-gray-500 text-white">
                        Register User
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-5 py-1.5 border border-gray-300 rounded-sm text-sm leading-normal dark:border-gray-700 dark:hover:border-gray-500 text-white">
                        Register Students
                    </a>
                @endif

                @if (Route::has('search'))
                    <a href="{{ route('search') }}" class="px-5 py-1.5 border border-gray-300 rounded-sm text-sm leading-normal dark:border-gray-700 dark:hover:border-gray-500 text-white">
                        Search Students
                    </a>
                @endif
            @endauth
        </nav>
    @endif
    
    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg dark:bg-gray-900" style="background-color: #2973B2; color: white;">
        <h1 class="text-3xl font-bold text-center text-white">Selamat Datang di Website</h1>
        <p class="text-center mt-2 text-white">Silakan login atau daftar untuk melanjutkan.</p>

        <!-- Form pencarian status berdasarkan NISN -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-center text-white">Cari Status Pendaftaran</h2>
            <form action="{{ route('search.status') }}" method="GET" class="mt-4 flex justify-center">
                <input type="text" name="nisn" placeholder="Masukkan NISN" required 
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Cari
                </button>
            </form>
        </div>
    </div>
    
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    @endif
</body>
</html>
