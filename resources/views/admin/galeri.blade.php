{{-- =================================================================
* Halaman: Kelola Foto Dalam Album (admin.album.show)
* Deskripsi: Menampilkan semua foto dalam satu album spesifik
================================================================= --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Foto: {{ $album->nama }} - Admin</title>
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
        {{-- Sidebar admin --}}
        @include('layouts.aside')

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center text-gray-800">
                <div class="flex items-center">
                    <a href="{{ route('admin.album') }}" class="text-blue-600 hover:text-blue-800 mr-4">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </a>
                    <h2 class="text-2xl font-bold">
                        Album: <span class="text-blue-600">{{ $album->nama }}</span>
                    </h2>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <main class="flex-1 overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Daftar Foto</h3>
                        <button id="open-upload-modal-btn"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i>Unggah Foto Baru
                        </button>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4">
                        @forelse ($album->photos as $photo)
                            <div class="relative bg-white rounded-lg shadow-md overflow-hidden group aspect-square">
                                {{-- Foto --}}
                                <img src="{{ asset('storage/' . $photo->path) }}"
                                    alt="{{ $photo->description ?? 'Foto ' . $album->nama }}"
                                    class="w-full h-full object-cover">

                                {{-- Badge sampul --}}
                                @if ($photo->is_cover)
                                    <div
                                        class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full z-10">
                                        <i class="fas fa-star text-xs"></i> SAMPUL
                                    </div>
                                @endif

                                {{-- Overlay aksi --}}
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    {{-- Tombol Edit --}}
                                    <button
                                        class="open-edit-modal-btn text-white bg-yellow-500 hover:bg-yellow-600 rounded-full w-10 h-10 flex items-center justify-center"
                                        title="Edit Deskripsi" data-photo-id="{{ $photo->id }}"
                                        data-description="{{ $photo->description }}"
                                        data-action="{{ route('admin.photo.update', $photo->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    <button
                                        class="delete-photo-btn text-white bg-red-500 hover:bg-red-600 rounded-full w-10 h-10 flex items-center justify-center"
                                        title="Hapus Foto" data-photo-id="{{ $photo->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <form id="delete-form-{{ $photo->id }}"
                                        action="{{ route('admin.photo.destroy', $photo->id) }}" method="POST"
                                        class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    {{-- Tombol Jadikan Sampul --}}
                                    @if (!$photo->is_cover)
                                        <form action="{{ route('admin.photo.setcover', $photo->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="text-white bg-blue-500 hover:bg-blue-600 rounded-full w-10 h-10 flex items-center justify-center"
                                                title="Jadikan Sampul">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full bg-white text-center p-12 rounded-lg shadow-md">
                                <i class="fas fa-images text-5xl text-gray-300 mb-4"></i>
                                <h4 class="text-xl font-semibold text-gray-700">Album Ini Masih Kosong</h4>
                                <p class="text-gray-500 mt-2">Belum ada foto di dalam album ini. Silakan mulai dengan
                                    mengunggah foto baru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>

    {{-- Modal Upload --}}
    <div id="upload-modal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6 text-gray-800">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Unggah Foto ke Album "{{ $album->nama }}"</h3>
                <button id="close-upload-modal-btn" class="text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
            </div>
            <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="album_id" value="{{ $album->id }}">
                <div class="mb-4">
                    <label for="photos" class="block font-medium mb-2">Pilih File (bisa lebih dari satu):</label>
                    <input type="file" name="path[]" id="photos" multiple required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                        <i class="fas fa-upload mr-2"></i>Unggah
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div id="edit-modal" class="modal fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-1/2 p-6 text-gray-800">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Edit Deskripsi Foto</h3>
                <button id="close-edit-modal-btn" class="text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
            </div>
            <form id="edit-photo-form" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="description" class="block font-medium mb-2">Deskripsi:</label>
                    <textarea name="description" id="description" rows="4" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg">
                        <i class="fas fa-save mr-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Modal Upload
            const uploadModal = document.getElementById('upload-modal');
            const openUploadBtn = document.getElementById('open-upload-modal-btn');
            const closeUploadBtn = document.getElementById('close-upload-modal-btn');
            if (openUploadBtn) openUploadBtn.addEventListener('click', () => uploadModal.classList.add('active'));
            if (closeUploadBtn) closeUploadBtn.addEventListener('click', () => uploadModal.classList.remove(
                'active'));

            // Modal Edit
            const editModal = document.getElementById('edit-modal');
            const editForm = document.getElementById('edit-photo-form');
            const descriptionTextarea = document.getElementById('description');
            const openEditBtns = document.querySelectorAll('.open-edit-modal-btn');
            const closeEditBtn = document.getElementById('close-edit-modal-btn');
            openEditBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    editForm.action = btn.dataset.action;
                    descriptionTextarea.value = btn.dataset.description;
                    editModal.classList.add('active');
                });
            });
            if (closeEditBtn) closeEditBtn.addEventListener('click', () => editModal.classList.remove('active'));

            // Hapus Foto (SweetAlert)
            const deleteBtns = document.querySelectorAll('.delete-photo-btn');
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const photoId = btn.dataset.photoId;
                    const deleteForm = document.getElementById(`delete-form-${photoId}`);
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Foto yang dihapus tidak dapat dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        background: '#fff',
                    }).then((result) => {
                        if (result.isConfirmed) deleteForm.submit();
                    });
                });
            });

            // Klik luar modal
            window.addEventListener('click', (e) => {
                if (e.target === uploadModal) uploadModal.classList.remove('active');
                if (e.target === editModal) editModal.classList.remove('active');
            });
        });
    </script>
</body>

</html>
