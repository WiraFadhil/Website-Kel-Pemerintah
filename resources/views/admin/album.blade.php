{{-- 
    =================================================================
    * Halaman: Daftar Album (admin.album.index)
    * Deskripsi: Halaman utama untuk melihat semua album.
    * Admin bisa menambah album baru, mengedit, menghapus,
    * dan masuk ke mode kelola foto untuk setiap album.
    =================================================================
--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Album - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .modal {
            display: none;
        }

        .modal.active {
            display: flex;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-800 text-white">
        {{-- Sidebar Navigasi Admin --}}
        @include('layouts.aside')

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Manajemen Album</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">

                </div>
            </header>

            <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Daftar Album</h3>
                        {{-- Tombol Utama: Tambah Album Baru --}}
                        <button id="open-tambah-modal-btn"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Album Baru
                        </button>
                    </div>

                    {{-- Grid untuk menampilkan Album-album --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($albums as $album)
                            <div class="bg-white rounded-lg shadow-md flex flex-col">
                                {{-- Mengambil gambar sampul album --}}
                                @php
                                    $cover = $album->photos->firstWhere('is_cover', 1);
                                @endphp
                                <img src="{{ $cover ? asset('storage/' . $cover->path) : 'https://via.placeholder.com/600x400.png?text=No+Cover' }}"
                                    alt="Sampul {{ $album->nama }}" class="w-full h-48 object-cover rounded-t-lg">

                                <div class="p-4 flex-grow">
                                    <h4 class="text-lg font-bold text-gray-800">{{ $album->nama }}</h4>
                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                                        {{ $album->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                                </div>

                                {{-- Area Aksi untuk setiap Album --}}
                                <div class="p-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                                    <span class="text-xs text-gray-500">{{ $album->photos->count() }} Foto</span>
                                    <div class="flex space-x-2">
                                        {{-- Tombol KELOLA FOTO --}}
                                        <a href="{{ route('admin.galeri', $album->id) }}"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 text-sm rounded-md"
                                            title="Kelola Foto">
                                            <i class="fas fa-images"></i>
                                        </a>
                                        {{-- Tombol Edit Album --}}
                                        <button
                                            class="open-edit-modal-btn bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 text-sm rounded-md"
                                            title="Edit Album" data-id="{{ $album->id }}"
                                            data-nama="{{ $album->nama }}" data-deskripsi="{{ $album->deskripsi }}"
                                            data-action="{{ route('admin.album.update', $album->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        {{-- Tombol Hapus Album --}}
                                        <button
                                            class="delete-album-btn bg-red-500 hover:bg-red-600 text-white px-3 py-1 text-sm rounded-md"
                                            title="Hapus Album" data-id="{{ $album->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="delete-form-{{ $album->id }}"
                                            action="{{ route('admin.album.destroy', $album->id) }}" method="POST"
                                            class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full bg-white text-center p-12 rounded-lg shadow-md">
                                <i class="fas fa-folder-open text-5xl text-gray-300 mb-4"></i>
                                <h4 class="text-xl font-semibold text-gray-700">Belum Ada Album</h4>
                                <p class="text-gray-500 mt-2">Silakan buat album pertama Anda.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- MODAL UNTUK TAMBAH ALBUM BARU --}}
    <div id="tambah-modal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6 text-gray-800">
            <h3 class="text-xl font-bold mb-4">Tambah Album Baru</h3>
            <form action="{{ route('admin.album.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block font-medium mb-2">Nama Album</label>
                    <input type="text" name="nama" id="nama"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block font-medium mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="close-tambah-modal-btn"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL UNTUK EDIT ALBUM --}}
    <div id="edit-modal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6 text-gray-800">
            <h3 class="text-xl font-bold mb-4">Edit Album</h3>
            <form id="edit-album-form" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_nama" class="block font-medium mb-2">Nama Album</label>
                    <input type="text" name="nama" id="edit_nama"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="edit_deskripsi" class="block font-medium mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="edit_deskripsi" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="close-edit-modal-btn"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">Batal</button>
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const closeSidebarBtn = document.getElementById('close-sidebar');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }

            // Tombol hamburger
            if (menuToggle) {
                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    toggleSidebar();
                });
            }

            // Tombol silang di sidebar
            if (closeSidebarBtn) {
                closeSidebarBtn.addEventListener('click', function() {
                    toggleSidebar();
                });
            }

            // Klik overlay
            if (overlay) {
                overlay.addEventListener('click', function() {
                    toggleSidebar();
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Modal Tambah
            const tambahModal = document.getElementById('tambah-modal');
            document.getElementById('open-tambah-modal-btn').addEventListener('click', () => tambahModal.classList
                .add('active'));
            document.getElementById('close-tambah-modal-btn').addEventListener('click', () => tambahModal.classList
                .remove('active'));

            // Modal Edit
            const editModal = document.getElementById('edit-modal');
            const editForm = document.getElementById('edit-album-form');
            document.querySelectorAll('.open-edit-modal-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    editForm.action = btn.dataset.action;
                    document.getElementById('edit_nama').value = btn.dataset.nama;
                    document.getElementById('edit_deskripsi').value = btn.dataset.deskripsi;
                    editModal.classList.add('active');
                });
            });
            document.getElementById('close-edit-modal-btn').addEventListener('click', () => editModal.classList
                .remove('active'));

            // Hapus Album
            document.querySelectorAll('.delete-album-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const albumId = btn.dataset.id;
                    Swal.fire({
                        title: 'Anda yakin ingin menghapus album ini?',
                        text: "Semua foto di dalamnya juga akan terhapus!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${albumId}`).submit();
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>
