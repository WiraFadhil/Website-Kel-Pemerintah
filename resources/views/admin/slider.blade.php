{{-- Ganti dengan layout admin yang kamu punya, contoh: @extends('layouts.admin') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sliders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        @include('layouts.aside')

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Slider Banner</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>


            <main class="flex-1 overflow-y-auto">
                <div class="container mx-auto p-4 sm:p-8">
                    {{-- Header Konten --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-3 sm:mb-0">Manage Sliders</h1>
                        <a href="{{ route('admin.tambah-slider') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2 rounded-lg shadow-md transition-all">Add
                            New Slider</a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Tabel Responsif --}}
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <table class="min-w-full">
                            {{-- Header Tabel untuk Desktop --}}
                            <thead class="bg-gray-200 hidden md:table-header-group">
                                <tr>
                                    <th class="py-3 px-4 text-left">Image</th>
                                    <th class="py-3 px-4 text-left">Title</th>
                                    <th class="py-3 px-4 text-left">Order</th>
                                    <th class="py-3 px-4 text-center">Status</th>
                                    <th class="py-3 px-4 text-center">Actions</th>
                                </tr>
                            </thead>
                            {{-- Body Tabel --}}
                            <tbody class="divide-y divide-gray-200 md:divide-y-0">
                                @forelse ($sliders as $slider)
                                    {{-- Setiap baris menjadi blok pada mobile --}}
                                    <tr class="block md:table-row border-b md:border-b-0">
                                        {{-- Sel dengan label untuk mobile --}}
                                        <td class="p-4 md:py-3 md:px-4 flex justify-between items-center md:table-cell">
                                            <span class="font-bold md:hidden mr-2">Image:</span>
                                            <img src="{{ Storage::url($slider->image_path) }}"
                                                alt="{{ $slider->title }}" class="h-16 w-32 object-cover rounded-md">
                                        </td>
                                        <td class="p-4 md:py-3 md:px-4 flex justify-between items-center md:table-cell">
                                            <span class="font-bold md:hidden mr-2">Title:</span>
                                            <span
                                                class="text-right md:text-left font-medium text-gray-700">{{ $slider->title }}</span>
                                        </td>
                                        <td class="p-4 md:py-3 md:px-4 flex justify-between items-center md:table-cell">
                                            <span class="font-bold md:hidden mr-2">Order:</span>
                                            <span
                                                class="text-right md:text-left text-gray-600">{{ $slider->order }}</span>
                                        </td>
                                        <td
                                            class="p-4 md:py-3 md:px-4 flex justify-between items-center md:table-cell md:text-center">
                                            <span class="font-bold md:hidden mr-2">Status:</span>
                                            <div>
                                                @if ($slider->is_active)
                                                    <span
                                                        class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Active</span>
                                                @else
                                                    <span
                                                        class="px-3 py-1 text-sm font-semibold text-red-800 bg-red-200 rounded-full">Inactive</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td
                                            class="p-4 md:py-3 md:px-4 flex justify-between items-center md:table-cell md:text-center">
                                            <span class="font-bold md:hidden mr-2">Actions:</span>
                                            <div class="space-x-4">
                                                <a href="{{ route('admin.edit-slider', $slider) }}"
                                                    class="text-yellow-600 hover:text-yellow-800 font-bold">Edit</a>
                                                <form action="{{ route('admin.slider.destroy', $slider) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Are you sure you want to delete this slider?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-800 font-bold">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-10 text-gray-500">No sliders found.
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
            const sidebar = document.getElementById('sidebar'); // Pastikan ID 'sidebar' ada di layouts.aside
            const overlay = document.getElementById('sidebar-overlay');
            const closeSidebar = document.getElementById('close-sidebar'); // Pastikan ID ini ada di layouts.aside

            function toggleSidebar() {
                if (sidebar) { // Cek jika sidebar ada
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
                overlay.addEventListener('click', function() {
                    toggleSidebar();
                });
            }

            if (closeSidebar) {
                closeSidebar.addEventListener('click', function() {
                    toggleSidebar();
                });
            }
        });
    </script>
</body>

</html>
