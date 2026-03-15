<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl lg:grid lg:grid-cols-2 bg-white rounded-2xl shadow-2xl overflow-hidden">

            <div class="hidden lg:flex flex-col items-center justify-center bg-slate-800 p-12 text-white text-center">
                {{-- Pastikan path ke logo Anda benar di folder public/images/ --}}
                <img src="{{ asset('images/logo.png') }}" alt="Logo Kabupaten Jeneponto" class="w-28 h-28 mb-4">
                <h1 class="text-3xl font-extrabold">KABUPATEN JENEPONTO</h1>
                <p class="mt-2 text-slate-300">Portal Masuk Panel Admin</p>
            </div>

            <div class="p-8 md:p-12">
                {{-- Logo untuk tampilan mobile --}}
                <div class="lg:hidden text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kabupaten Jeneponto"
                        class="w-20 h-20 mx-auto mb-2">
                    <h2 class="text-2xl font-bold text-gray-800">Admin Login</h2>
                </div>

                <h2 class="hidden lg:block text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
                <p class="hidden lg:block text-gray-500 mb-8">Silakan masuk untuk melanjutkan</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <x-input-label for="email" value="Alamat Email" class="font-semibold" />
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <x-text-input id="email" class="block w-full pl-10" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username"
                                placeholder="nama@email.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" value="Password" class="font-semibold" />
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <x-text-input id="password" class="block w-full pl-10" type="password" name="password"
                                required autocomplete="current-password" placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4 text-sm">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                                name="remember">
                            <span class="ms-2 text-gray-600">Ingat Saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline text-blue-600 hover:text-blue-800"
                                href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <div class="mt-8">
                        {{-- Komponen tombol utama dari Breeze --}}
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Log In
                        </button>
                    </div>

                    <div class="mt-8 text-center text-sm">
                        <a href="{{ url('/') }}" class="text-gray-500 hover:text-blue-600 transition-colors">
                            <i class="fas fa-arrow-left mr-1"></i>
                            Kembali ke Portal Utama
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
