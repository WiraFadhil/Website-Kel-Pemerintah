<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penghargaan - Admin Panel</title>

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

    <div class="flex h-screen bg-gray-200">
        @include('layouts.aside')
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <!-- Tombol Back -->
                    <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800">Edit Penghargaan</h2>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto max-w-3xl">
                    <div class="bg-white p-8 rounded-lg shadow-md">
                        <form action="{{ route('admin.penghargaan-update', $penghargaan->id) }}" method="POST">
                            @csrf
                            @method('PUT') {{-- Penting: Method untuk form edit --}}

                            <div class="mb-4">
                                <label for="nama_penghargaan" class="block text-gray-700 text-sm font-bold mb-2">Nama
                                    Penghargaan</label>
                                <input type="text" name="nama_penghargaan" id="nama_penghargaan"
                                    value="{{ old('nama_penghargaan', $penghargaan->nama_penghargaan) }}"
                                    class="shadow appearance-none border @error('nama_penghargaan') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                @error('nama_penghargaan')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="pemberi" class="block text-gray-700 text-sm font-bold mb-2">Pemberi
                                    Penghargaan</label>
                                <input type="text" name="pemberi" id="pemberi"
                                    value="{{ old('pemberi', $penghargaan->pemberi) }}"
                                    class="shadow appearance-none border @error('pemberi') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700"
                                    required>
                                @error('pemberi')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tahun" class="block text-gray-700 text-sm font-bold mb-2">Tahun</label>
                                <input type="number" name="tahun" id="tahun"
                                    value="{{ old('tahun', $penghargaan->tahun) }}"
                                    class="shadow appearance-none border @error('tahun') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700"
                                    placeholder="Contoh: 2025" required>
                                @error('tahun')
                                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi
                                    (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('deskripsi', $penghargaan->deskripsi) }}</textarea>
                            </div>

                            <div class="flex items-center justify-end gap-4">
                                <a href="{{ route('admin.penghargaan') }}"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                                    Simpan Perubahan
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
            const overlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleSidebar();
            });
            overlay.addEventListener('click', function() {
                toggleSidebar();
            });
        });
    </script>
</body>

</html>
