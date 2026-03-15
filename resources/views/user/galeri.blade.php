<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Kabupaten Jeneponto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }

        /* Style untuk Lightbox */
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
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 80%;
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

<body class="bg-gray-100 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Galeri Foto</h1>
                <nav class="text-sm font-medium">
                    <a href="#" class="hover:underline text-blue-600">Beranda</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-700">Galeri</span>
                </nav>
            </div>
        </section>

        <section id="galeri" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800">Galeri Album</h2>
                    <p class="text-lg text-gray-500 mt-2">Lihat dokumentasi kegiatan melalui album.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($albums as $album)
                        <a href="{{ route('album.show', $album->id) }}"
                            class="group relative rounded-xl shadow-lg overflow-hidden cursor-pointer">
                            <img src="{{ $album->cover ? asset('storage/' . $album->cover->path) : 'https://via.placeholder.com/600x400.png?text=No+Cover' }}"
                                alt="Thumbnail {{ $album->nama }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all duration-300 flex items-center justify-center">
                                <i
                                    class="fas fa-images text-7xl text-white/80 transform group-hover:scale-110 transition-transform duration-300"></i>
                            </div>
                            <div class="absolute bottom-0 left-0 p-4">
                                <h3 class="text-white font-bold text-lg">{{ $album->nama }}</h3>
                                <p class="text-white text-sm">{{ $album->photos->count() }} foto</p>
                            </div>
                        </a>
                    @endforeach
                </div>
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

            galleryImages.forEach(image => {
                image.parentElement.addEventListener('click', function(e) {
                    e.preventDefault(); // Mencegah perilaku default jika gambar dibungkus <a>
                    lightbox.style.display = 'flex';
                    lightboxImage.src = image.src;
                    lightboxCaption.textContent = image.alt;
                });
            });

            // Fungsi untuk menutup lightbox
            function closeLightbox() {
                lightbox.style.display = 'none';
            }

            lightboxClose.addEventListener('click', closeLightbox);
            lightbox.addEventListener('click', function(e) {
                // Hanya tutup jika yang diklik adalah area latar belakang gelap
                if (e.target === lightbox) {
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
