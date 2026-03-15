{{-- Ganti dengan layout admin yang kamu punya, contoh: @extends('layouts.admin') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slider</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .scrollbar-hide {
            /* Untuk Firefox */
            scrollbar-width: none;
            /* Untuk Internet Explorer & Edge versi lama */
            -ms-overflow-style: none;
        }

        /* Untuk Chrome, Safari, dan Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        @include('layouts.aside');

        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-md p-4 flex justify-between items-center">
                <button id="menu-toggle" class="md:hidden text-gray-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-2xl font-bold text-gray-800">Edit Slider</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>

            <div class="flex-1 overflow-y-auto scrollbar-hide container mx-auto p-8 max-w-3xl">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Slider</h1>
                <div class="bg-white p-8 rounded-lg shadow-lg">

                    {{-- Kode form dimulai di sini --}}
                    <form action="{{ route('admin.slider.update', $slider) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $slider->title) }}"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    required>
                            </div>
                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    required>{{ old('description', $slider->description) }}</textarea>
                            </div>
                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <input type="file" name="image" id="image"
                                    class="mt-1 block w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <img src="{{ Storage::url($slider->image_path) }}" class="h-24 w-auto mt-4 rounded-md">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="button_text" class="block text-sm font-medium text-gray-700">Button
                                        Text</label>
                                    <input type="text" name="button_text" id="button_text"
                                        value="{{ old('button_text', $slider->button_text) }}"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"
                                        required>
                                </div>
                                <div>
                                    <label for="button_link" class="block text-sm font-medium text-gray-700">Button Link
                                        (URL)</label>
                                    <input type="url" name="button_link" id="button_link"
                                        value="{{ old('button_link', $slider->button_link) }}"
                                        placeholder="https://example.com"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"
                                        required>
                                </div>
                            </div>
                            <div>
                                <label for="button_color_class" class="block text-sm font-medium text-gray-700">Button
                                    Color
                                    Class (Tailwind CSS)</label>
                                <input type="text" name="button_color_class" id="button_color_class"
                                    value="{{ old('button_color_class', $slider->button_color_class) }}"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">Example: bg-green-600 hover:bg-green-700</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                                    <input type="number" name="order" id="order"
                                        value="{{ old('order', $slider->order) }}"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"
                                        required>
                                </div>
                                <div>
                                    <label for="is_active"
                                        class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="is_active" id="is_active"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
                                        <option value="1" @selected(old('is_active', $slider->is_active) == 1)>Active</option>
                                        <option value="0" @selected(old('is_active', $slider->is_active) == 0)>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end pt-4">
                                <a href="{{ route('admin.slider') }}"
                                    class="bg-gray-200 text-gray-800 font-bold px-6 py-2 rounded-lg mr-4">Cancel</a>
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-2 rounded-lg shadow-md transition-all">Save
                                    Slider</button>
                            </div>
                        </div>
                    </form>
                    {{-- Kode form berakhir di sini --}}

                </div>
            </div>
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
