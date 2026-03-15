<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Penyesuaian untuk posisi ikon */
        .input-icon-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            /* gray-400 */
            pointer-events: none;
            /* Agar ikon tidak bisa diklik */
        }

        .input-field {
            padding-left: 2.5rem;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        @include('layouts.aside')

        {{-- Konten utama --}}
        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Pegawai</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="p-6 md:py-12">
                    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            <div class="p-6 sm:p-8">
                                <div class="mb-8">
                                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                                        Tambah Data Pegawai
                                    </h2>
                                    <p class="text-gray-500 mt-1">Masukkan detail pegawai baru pada form di bawah ini.
                                    </p>
                                </div>

                                @if ($errors->any())
                                    <div class="mb-6 p-4 text-sm text-red-800 bg-red-100 rounded-lg">
                                        <div class="font-bold">Oops! Terjadi kesalahan.</div>
                                        <ul class="mt-2 list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('admin.pegawai.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                                        <div>
                                            <label for="nama"
                                                class="block font-medium text-sm text-gray-700 mb-1">Nama
                                                Lengkap</label>
                                            <div class="input-icon-wrapper">
                                                <i class="fas fa-user input-icon"></i>
                                                <input type="text" name="nama" id="nama"
                                                    class="input-field block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    value="{{ old('nama') }}" required
                                                    placeholder="cth: Budi Santoso">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="jabatan"
                                                class="block font-medium text-sm text-gray-700 mb-1">Jabatan</label>
                                            <div class="input-icon-wrapper">
                                                <i class="fas fa-briefcase input-icon"></i>
                                                <input type="text" name="jabatan" id="jabatan"
                                                    class="input-field block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    value="{{ old('jabatan') }}" required
                                                    placeholder="cth: Staff Programmer">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="nip"
                                                class="block font-medium text-sm text-gray-700 mb-1">NIP
                                                (Opsional)</label>
                                            <div class="input-icon-wrapper">
                                                <i class="fas fa-id-card input-icon"></i>
                                                <input type="text" name="nip" id="nip"
                                                    class="input-field block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    value="{{ old('nip') }}" placeholder="cth: 199001012020011001">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="urutan"
                                                class="block font-medium text-sm text-gray-700 mb-1">Urutan
                                                Tampil</label>
                                            <div class="input-icon-wrapper">
                                                <i class="fas fa-sort-numeric-down input-icon"></i>
                                                <input type="number" name="urutan" id="urutan"
                                                    class="input-field block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    value="{{ old('urutan', 0) }}" required>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="parent_id"
                                                class="block font-medium text-sm text-gray-700 mb-1">Atasan
                                                (Opsional)</label>
                                            <div class="input-icon-wrapper">
                                                <i class="fas fa-user-tie input-icon"></i>
                                                <select name="parent_id" id="parent_id"
                                                    class="input-field block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    <option value="">-- Tidak ada atasan --</option>
                                                    @foreach ($pegawais as $p)
                                                        <option value="{{ $p->id }}"
                                                            {{ old('parent_id') == $p->id ? 'selected' : '' }}>
                                                            {{ $p->nama }} - {{ $p->jabatan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="md:col-span-2">
                                            <label class="block font-medium text-sm text-gray-700 mb-1">Unggah Foto
                                                (Opsional)</label>
                                            <div class="mt-2 flex items-center gap-4">
                                                <img id="foto-preview"
                                                    src="https://placehold.co/100x100/e2e8f0/a0aec0?text=Preview"
                                                    alt="Pratinjau Foto" class="h-24 w-24 rounded-full object-cover">

                                                <label for="foto"
                                                    class="cursor-pointer bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                    <span>Pilih File</span>
                                                    <input type="file" name="foto" id="foto" class="sr-only"
                                                        onchange="previewImage()">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex flex-col sm:flex-row items-center sm:justify-end mt-8 pt-6 border-t border-gray-200 gap-4">
                                        <a href="{{ route('admin.struktur') }}"
                                            class="w-full sm:w-auto text-center px-6 py-2 text-sm text-gray-600 hover:text-gray-900 rounded-md border sm:border-0">
                                            Batal
                                        </a>
                                        <button type="submit"
                                            class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            <i class="fas fa-save mr-2"></i>
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 md:hidden">
    </div>

    <script>
        // --- Preview Image Script ---
        function previewImage() {
            const foto = document.querySelector('#foto');
            const preview = document.querySelector('#foto-preview');

            const file = foto.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        // --- Sidebar Toggle Script ---
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar'); // Pastikan ID 'sidebar' ada di layouts.aside
            const overlay = document.getElementById('sidebar-overlay');
            const closeSidebar = document.getElementById('close-sidebar'); // Pastikan ID ini ada di layouts.aside

            function toggleSidebar() {
                if (sidebar && overlay) { // Check if elements exist
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
