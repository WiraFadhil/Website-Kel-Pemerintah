<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Album: {{ $album->nama }} - Kabupaten Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }

        .lightbox {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .lightbox-content {
            max-width: 90vw;
            max-height: 85vh;
            object-fit: contain;
        }

        .lightbox-caption {
            margin-top: 15px;
            color: #ccc;
            text-align: center;
            font-size: 1.1em;
        }

        .lightbox-close {
            position: absolute;
            top: 25px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between md:items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold text-slate-800">{{ $album->nama }}</h1>
                    <p class="text-gray-500 mt-1">{{ $album->deskripsi }}</p>
                </div>
                <nav class="text-sm font-medium">
                    <a href="{{ route('dashboard') }}" class="hover:underline text-blue-600">Beranda</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <a href="{{ route('user.galeri') }}" class="hover:underline text-blue-600">Galeri</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-700">{{ $album->nama }}</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12 md:py-16">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @forelse ($album->photos as $photo)
                    <div class="group relative overflow-hidden rounded-lg shadow-md cursor-pointer aspect-square">
                        <img src="{{ asset('storage/' . $photo->path) }}"
                            alt="{{ $photo->description ?? 'Foto dari galeri ' . $album->nama }}"
                            class="h-full w-full object-cover transform transition-transform duration-300 group-hover:scale-110 gallery-image">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-search-plus text-white text-3xl"></i>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-camera-retro text-5xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600">Album ini masih kosong</h3>
                        <p class="text-gray-400">Belum ada foto yang ditambahkan ke dalam album ini.</p>
                    </div>
                @endforelse

            </div>
        </section>
    </main>

    <div id="lightbox" class="lightbox">
        <span class="lightbox-close" id="lightbox-close">&times;</span>
        <img class="lightbox-content" id="lightbox-image">
        <div id="lightbox-caption" class="lightbox-caption"></div>
    </div>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryImages = document.querySelectorAll('.gallery-image');
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCaption = document.getElementById('lightbox-caption');
            const lightboxClose = document.getElementById('lightbox-close');

            function openLightbox(imageElement) {
                lightbox.style.display = 'flex';
                lightboxImage.src = imageElement.src;
                lightboxCaption.textContent = imageElement.alt;
            }

            galleryImages.forEach(image => {
                image.parentElement.addEventListener('click', function(e) {
                    e.preventDefault();
                    openLightbox(image);
                });
            });

            function closeLightbox() {
                lightbox.style.display = 'none';
            }

            lightboxClose.addEventListener('click', closeLightbox);

            lightbox.addEventListener('click', function(e) {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && lightbox.style.display !== 'none') {
                    closeLightbox();
                }
            });
        });
    </script>

    <script>
        // Menunggu hingga seluruh dokumen HTML selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {

            // Mengambil semua tombol yang akan memicu dropdown
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    // Menghentikan event agar tidak langsung ditangkap oleh 'window'
                    event.stopPropagation();

                    // Menemukan menu dropdown yang sesuai (elemen saudara berikutnya)
                    const dropdownMenu = this.nextElementSibling;

                    // Menutup semua dropdown lain yang mungkin sedang terbuka
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        if (menu !== dropdownMenu) {
                            menu.classList.add('hidden');
                        }
                    });

                    // Membuka atau menutup dropdown yang diklik
                    dropdownMenu.classList.toggle('hidden');
                });
            });

            // 3. Logika untuk Submenu (nested dropdown)
            const submenuToggles = document.querySelectorAll('.submenu-toggle');

            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(event) {
                    // Cegah link berpindah halaman saat diklik
                    event.preventDefault();
                    event.stopPropagation();

                    const submenu = this.nextElementSibling;

                    // Tutup semua submenu lain pada level yang sama
                    const parentMenu = this.closest('.dropdown-menu');
                    parentMenu.querySelectorAll('.submenu').forEach(s => {
                        if (s !== submenu) {
                            s.classList.add('hidden');
                        }
                    });

                    submenu.classList.toggle('hidden');
                });
            });

            window.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            });
        });
    </script>

    <script>
        // Toggle menu pada mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>

</body>

</html>
