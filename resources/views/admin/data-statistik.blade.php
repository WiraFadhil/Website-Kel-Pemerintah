<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Statistik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
                <h2 class="text-2xl font-bold text-gray-800">Data Statistik</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 md:p-8 lg:p-10">
                <div class="container mx-auto">

                    <div class="mb-8 flex flex-col sm:flex-row justify-between sm:items-center gap-4">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">Manajemen Data Statistik</h1>
                            <p class="text-gray-500 mt-1">Tambah, edit, atau hapus data statistik.</p>
                        </div>
                        <a href="{{ route('admin.tambah-data-statistik') }}"
                            class="w-full sm:w-auto bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Data
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-6"
                            role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50 hidden md:table-header-group">
                                <tr>
                                    <th class="p-4 font-semibold text-sm text-gray-600">Judul Data</th>
                                    <th class="p-4 font-semibold text-sm text-gray-600">Nilai</th>
                                    <th class="p-4 font-semibold text-sm text-gray-600">Grup</th>
                                    <th class="p-4 font-semibold text-sm text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($statistics as $stat)
                                    <tr
                                        class="block md:table-row border-b last:border-b-0 md:border-b hover:bg-gray-50">
                                        <td
                                            class="p-4 flex justify-between items-center md:table-cell border-b md:border-none">
                                            <span class="font-bold text-sm text-gray-500 uppercase md:hidden">Judul
                                                Data</span>
                                            <span
                                                class="text-gray-800 font-medium text-right md:text-left">{{ $stat->title }}</span>
                                        </td>
                                        <td
                                            class="p-4 flex justify-between items-center md:table-cell border-b md:border-none">
                                            <span
                                                class="font-bold text-sm text-gray-500 uppercase md:hidden">Nilai</span>
                                            <span class="text-gray-600 text-right md:text-left">
                                                <b class="text-gray-800">{{ $stat->value }}</b> {{ $stat->unit }}
                                            </span>
                                        </td>
                                        <td
                                            class="p-4 flex justify-between items-center md:table-cell border-b md:border-none">
                                            <span
                                                class="font-bold text-sm text-gray-500 uppercase md:hidden">Grup</span>
                                            <span
                                                class="text-gray-500 capitalize text-right md:text-left">{{ str_replace('_', ' ', $stat->group) }}</span>
                                        </td>
                                        <td class="p-4 flex justify-end items-center md:table-cell">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('admin.edit-data-statistik', $stat->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                                <form action="{{ route('admin.data-statistik.destroy', $stat->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-6 text-center text-gray-500">Belum ada data
                                            statistik.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
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
