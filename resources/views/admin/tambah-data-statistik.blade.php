<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Statistik Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        @include('layouts.aside')

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Struktur Organisasi</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 md:p-8 lg:p-10">
                <div class="container mx-auto max-w-3xl">

                    <div class="mb-8">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Tambah Data Statistik Baru</h1>
                        <p class="text-gray-500 mt-1">Isi formulir di bawah ini.</p>
                    </div>

                    <div class="bg-white p-6 sm:p-8 rounded-xl shadow-md">
                        <form action="{{ route('admin.data-statistik.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="md:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Judul
                                        Data</label>
                                    <input type="text" name="title" id="title"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>

                                <div>
                                    <label for="key" class="block text-sm font-medium text-gray-700">Key (unik,
                                        tanpa
                                        spasi)</label>
                                    <input type="text" name="key" id="key"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="contoh: total_wifi" required>
                                </div>

                                <div>
                                    <label for="group" class="block text-sm font-medium text-gray-700">Grup</label>
                                    <input type="text" name="group" id="group"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="contoh: summary" required>
                                </div>

                                <div>
                                    <label for="value" class="block text-sm font-medium text-gray-700">Nilai</label>
                                    <input type="text" name="value" id="value"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>

                                <div>
                                    <label for="unit" class="block text-sm font-medium text-gray-700">Satuan
                                        (Unit)</label>
                                    <input type="text" name="unit" id="unit"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Contoh: Titik, %, km">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="notes" class="block text-sm font-medium text-gray-700">Catatan
                                        Tambahan</label>
                                    <input type="text" name="notes" id="notes"
                                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                </div>

                            </div>

                            <div class="mt-8 pt-6 border-t flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                                <a href="{{ route('admin.data-statistik') }}"
                                    class="w-full sm:w-auto text-center bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-lg hover:bg-gray-300">Batal</a>
                                <button type="submit"
                                    class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </main>
        </div>

    </div>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden">
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const closeSidebar = document.getElementById('close-sidebar');

            function toggleSidebar() {
                // [IMPROVEMENT] Check if elements exist before using them
                if (sidebar && overlay) {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                }
            }

            if (menuToggle) {
                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleSidebar();
                });
            }

            if (overlay) {
                overlay.addEventListener('click', toggleSidebar);
            }

            if (closeSidebar) {
                closeSidebar.addEventListener('click', toggleSidebar);
            }
        });
    </script>


</body>

</html>
