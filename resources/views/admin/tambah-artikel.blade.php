<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel Baru - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: #4a5568;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-800 text-white">
        {{-- Mengasumsikan sidebar Anda ada di layouts/aside.blade.php --}}
        @include('layouts.aside')

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Artikel Baru</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto">
                    <div class="bg-white shadow-md rounded-lg p-8">
                        {{-- Form untuk menambah artikel baru --}}
                        <form action="{{ route('admin.artikel-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-6">
                                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul
                                    Artikel</label>
                                <input type="text" name="judul" id="judul"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                                    value="{{ old('judul') }}" required placeholder="Masukkan judul artikel...">
                                @error('judul')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="tanggal"
                                    class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                                    value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2">Gambar
                                    Artikel</label>
                                <input type="file" name="gambar" id="gambar"
                                    class="w-full text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:bg-blue-600 file:text-white file:px-4 file:py-2 file:border-0 file:mr-4 hover:file:bg-blue-700"
                                    required>
                                @error('gambar')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="isi" class="block text-sm font-medium text-gray-700 mb-2">Isi
                                    Artikel</label>
                                <textarea name="isi" id="isi" rows="10"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                                    required placeholder="Tulis isi artikel di sini...">{{ old('isi') }}</textarea>
                                @error('isi')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('admin.artikel') }}"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">
                                    <i class="fas fa-save mr-2"></i>Tambah Artikel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
