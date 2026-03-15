<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Penghargaan - Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Opsi untuk scrollbar sidebar, sudah bagus */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: #4a5568;
            border-radius: 10px;
        }

        /* Menambahkan style untuk label data pada tampilan mobile */
        @media (max-width: 767px) {
            .mobile-label::before {
                content: attr(data-label);
                font-weight: 600;
                float: left;
                margin-right: 1rem;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen bg-gray-200">
        @include('layouts.aside')
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600" aria-label="Buka Menu">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Manajemen Penghargaan</h2>
                <div class="flex items-center space-x-4">
                    <span class="hidden sm:inline text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 sm:p-6">
                <div class="container mx-auto">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4">
                        <h3 class="text-gray-700 text-xl sm:text-2xl font-semibold">Daftar Penghargaan</h3>
                        <a href="{{ route('admin.tambah-penghargaan') }}"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md flex items-center justify-center gap-2">
                            <i class="fas fa-plus"></i>
                            <span>Tambah Penghargaan</span>
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-4"
                            role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                        <table class="min-w-full leading-normal">
                            <thead class="hidden md:table-header-group bg-gray-200 text-gray-600 uppercase text-sm">
                                <tr>
                                    <th class="py-3 px-5 text-left">No</th>
                                    <th class="py-3 px-5 text-left">Nama Penghargaan</th>
                                    <th class="py-3 px-5 text-left">Pemberi</th>
                                    <th class="py-3 px-5 text-left">Tahun</th>
                                    <th class="py-3 px-5 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse ($penghargaans as $penghargaan)
                                    <tr
                                        class="block md:table-row mb-4 md:mb-0 border md:border-none rounded-lg shadow-md md:shadow-none">
                                        <td data-label="No"
                                            class="mobile-label block md:table-cell py-3 px-5 text-right md:text-left border-b md:border-b-gray-200">
                                            {{ $loop->iteration + $penghargaans->firstItem() - 1 }}
                                        </td>
                                        <td data-label="Nama"
                                            class="mobile-label block md:table-cell py-3 px-5 text-right md:text-left border-b md:border-b-gray-200">
                                            {{ $penghargaan->nama_penghargaan }}
                                        </td>
                                        <td data-label="Pemberi"
                                            class="mobile-label block md:table-cell py-3 px-5 text-right md:text-left border-b md:border-b-gray-200">
                                            {{ $penghargaan->pemberi }}
                                        </td>
                                        <td data-label="Tahun"
                                            class="mobile-label block md:table-cell py-3 px-5 text-right md:text-left border-b md:border-b-gray-200">
                                            {{ $penghargaan->tahun }}
                                        </td>
                                        <td data-label="Aksi"
                                            class="mobile-label block md:table-cell py-3 px-5 text-right md:text-center border-b-0">
                                            <a href="{{ route('admin.edit-penghargaan', $penghargaan->id) }}"
                                                class="text-yellow-500 hover:text-yellow-700 text-xl mr-4"
                                                aria-label="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('admin.penghargaan.destroy', $penghargaan->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 text-xl"
                                                    aria-label="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-10">
                                            <p class="text-gray-500 text-lg">Belum ada data penghargaan.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $penghargaans->links() }}
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
