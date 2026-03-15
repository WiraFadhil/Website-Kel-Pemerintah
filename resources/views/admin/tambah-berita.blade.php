<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita Baru - Admin Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Custom scrollbar for webkit browsers */
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
        @include('layouts.aside') <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Berita Berita</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto">

                    <div class="bg-white shadow-md rounded-lg p-8">
                        <form action="{{ route('admin.tambah-berita-store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf <div class="mb-6">
                                <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul
                                    Berita</label>
                                <input type="text" id="judul" name="judul" required
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Masukkan judul berita">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori
                                        Berita</label>
                                    <select id="kategori_id" name="kategori_id" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}"
                                                {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div>
                                    <label for="tanggal_kejadian"
                                        class="block text-gray-700 text-sm font-bold mb-2">Tanggal Kejadian</label>
                                    <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" required
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto
                                    Berita</label>
                                <input type="file" id="foto" name="foto" required
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, WEBP. Ukuran maks: 2MB.</p>
                            </div>

                            <div class="mb-6">
                                <label for="isi_berita" class="block text-gray-700 text-sm font-bold mb-2">Isi
                                    Berita</label>
                                <textarea id="isi_berita" name="isi_berita" rows="10" required
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Tulis isi berita di sini..."></textarea>
                            </div>

                            <div class="flex items-center justify-end">
                                <a href="{{ route('admin.berita') }}"
                                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Simpan Berita
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');

            // Cek jika sidebar ada sebelum menambahkan event listener
            if (menuToggle && sidebar) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
        });
    </script>

</body>

</html>
