<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Statistik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        {{-- Asumsi @include('layouts.aside') sudah responsif --}}
        @include('layouts.aside')

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center z-10">
                <button id="menu-toggle" class="md:hidden text-gray-600" aria-controls="sidebar" aria-expanded="false">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Struktur Organisasi</h2>
                <div class="flex items-center space-x-4">
                    <span class="hidden sm:inline text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                <div class="container mx-auto max-w-4xl">

                    <div class="mb-8">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Edit Data Statistik</h1>
                        <p class="text-gray-500 mt-1">Ubah data untuk: <strong>{{ $statistic->title }}</strong></p>
                    </div>

                    <div class="bg-white p-4 sm:p-6 md:p-8 rounded-xl shadow-md">
                        <form action="{{ route('admin.data-statistik.update', $statistic->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="md:col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Judul
                                        Data</label>
                                    <input type="text" name="title" id="title"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ $statistic->title }}" required>
                                </div>

                                <div>
                                    <label for="key" class="block text-sm font-medium text-gray-700">Key (unik,
                                        tanpa spasi)</label>
                                    <input type="text" name="key" id="key"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ $statistic->key }}" required>
                                </div>

                                <div>
                                    <label for="group" class="block text-sm font-medium text-gray-700">Grup</label>
                                    <input type="text" name="group" id="group"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ $statistic->group }}" required>
                                </div>

                                <div>
                                    <label for="value" class="block text-sm font-medium text-gray-700">Nilai</label>
                                    <input type="text" name="value" id="value"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ $statistic->value }}" required>
                                </div>

                                <div>
                                    <label for="unit" class="block text-sm font-medium text-gray-700">Satuan
                                        (Unit)</label>
                                    <input type="text" name="unit" id="unit"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ $statistic->unit }}">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="notes" class="block text-sm font-medium text-gray-700">Catatan
                                        Tambahan</label>
                                    <input type="text" name="notes" id="notes"
                                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        value="{{ $statistic->notes }}">
                                </div>

                            </div>

                            <div class="mt-8 pt-6 border-t flex flex-col sm:flex-row-reverse sm:justify-start gap-3">
                                <button type="submit"
                                    class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    Simpan Perubahan
                                </button>
                                <a href="{{ route('admin.data-statistik') }}"
                                    class="w-full sm:w-auto bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-lg hover:bg-gray-300 text-center transition duration-150 ease-in-out">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </main>
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
                    const isExpanded = sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                    menuToggle.setAttribute('aria-expanded', !isExpanded);
                }

                if (menuToggle && sidebar && overlay && closeSidebar) {
                    menuToggle.addEventListener('click', function(e) {
                        e.stopPropagation();
                        toggleSidebar();
                    });

                    overlay.addEventListener('click', toggleSidebar);
                    closeSidebar.addEventListener('click', toggleSidebar);
                }
            });
        </script>

</body>

</html>
