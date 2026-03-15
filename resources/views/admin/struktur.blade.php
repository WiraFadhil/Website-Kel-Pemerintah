<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        @media (max-width: 768px) {
            .responsive-table thead {
                display: none;
            }

            .responsive-table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 0.5rem;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                padding: 1rem;
            }

            .responsive-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 0.5rem;
                border-bottom: 1px solid #edf2f7;
                text-align: right;
            }

            .responsive-table td:last-child {
                border-bottom: none;
            }

            .responsive-table td::before {
                content: attr(data-label);
                font-weight: 500;
                text-align: left;
                margin-right: 1rem;
                color: #4a5568;
            }

            .responsive-table td[data-label="Foto"] img {
                margin-left: auto;
            }

            .responsive-table td[data-label="Aksi"]>div {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>

<body class="bg-gray-100">


    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        @include('layouts.aside')

        <div class="flex-1 flex flex-col">
            <!-- Header -->
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


            {{-- Konten Utama --}}
            <main class="flex-1 overflow-y-auto">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="mb-6 px-4 sm:px-0">
                            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                                Manajemen Pegawai
                            </h2>
                        </div>

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">

                                <!-- Tombol Tambah -->
                                <div class="mb-6">
                                    <a href="{{ route('admin.tambah-pegawai') }}"
                                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring ring-gray-300 transition ease-in-out duration-150">
                                        Tambah Pegawai
                                    </a>
                                </div>

                                <!-- Notifikasi -->
                                @if (session('success'))
                                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Tabel Data Pegawai -->
                                <div class="overflow-x-auto">
                                    <table class="min-w-full table-auto responsive-table">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    Urutan</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    Foto</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    Nama</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    Jabatan</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    NIP</th>
                                                <th
                                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                    Atasan</th>
                                                <th
                                                    class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 md:divide-y-0">
                                            @forelse ($pegawais as $pegawai)
                                                <tr>
                                                    <td data-label="Urutan" class="px-4 py-3 text-sm text-gray-500">
                                                        {{ $pegawai->urutan }}</td>
                                                    <td data-label="Foto" class="px-4 py-3">
                                                        <img src="{{ asset('storage/' . $pegawai->foto) }}"
                                                            alt="{{ $pegawai->nama }}"
                                                            class="h-10 w-10 rounded-full object-cover">
                                                    </td>
                                                    <td data-label="Nama"
                                                        class="px-4 py-3 text-sm font-medium text-gray-900">
                                                        {{ $pegawai->nama }}</td>
                                                    <td data-label="Jabatan" class="px-4 py-3 text-sm text-gray-500">
                                                        {{ $pegawai->jabatan }}</td>
                                                    <td data-label="NIP" class="px-4 py-3 text-sm text-gray-500">
                                                        {{ $pegawai->nip }}</td>
                                                    <td data-label="Atasan" class="px-4 py-3 text-sm text-gray-500">
                                                        {{ $pegawai->atasan ? $pegawai->atasan->nama : '-' }}
                                                    </td>
                                                    <td data-label="Aksi"
                                                        class="px-4 py-3 text-right text-sm font-medium">
                                                        <div class="flex justify-end items-center gap-2">
                                                            <a href="{{ route('admin.edit-pegawai', $pegawai->id) }}"
                                                                class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-xs">Edit</a>

                                                            <form
                                                                action="{{ route('admin.pegawai.destroy', $pegawai->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-xs">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7"
                                                        class="px-4 py-4 text-center text-sm text-gray-500">
                                                        Data pegawai masih kosong.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden">
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const closeSidebar = document.getElementById('close-sidebar');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            // Klik tombol hamburger
            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleSidebar();
            });

            // Klik overlay
            overlay.addEventListener('click', function() {
                toggleSidebar();
            });

            // Klik tombol X di dalam sidebar
            closeSidebar.addEventListener('click', function() {
                toggleSidebar();
            });
        });
    </script>

</body>

</html>
