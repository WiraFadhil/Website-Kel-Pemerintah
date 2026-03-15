<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="py-12 md:py-20 bg-gray-100">
            <div class="container mx-auto px-6">

                <div class="swiper hero-slider relative rounded-xl shadow-lg overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach ($sliders as $slider)
                            <div class="swiper-slide">
                                <div class="relative min-h-[70vh] bg-cover bg-center text-white flex items-center justify-center text-center"
                                    style="background-image: url('{{ Storage::url($slider->image_path) }}')">
                                    <div class="absolute inset-0 bg-black/60"></div>
                                    <div class="container mx-auto px-6 relative z-10">
                                        <div class="max-w-3xl mx-auto text-center">

                                            {{-- TAMBAHKAN CLASS 'break-words' DI SINI --}}
                                            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight break-words">
                                                {{ $slider->title }}
                                            </h1>

                                            {{-- TAMBAHKAN JUGA DI SINI UNTUK DESKRIPSI --}}
                                            <p class="mt-4 text-lg md:text-xl font-light break-words">
                                                {{ $slider->description }}
                                            </p>

                                            <a href="{{ $slider->button_link }}"
                                                class="mt-8 inline-block px-10 py-3 {{ $slider->button_color_class }} rounded-md font-bold transition-all duration-300">
                                                {{ $slider->button_text }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-next text-white"></div>
                    <div class="swiper-button-prev text-white"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>

        <section class="bg-slate-50 py-16 md:py-24">
            <div class="container mx-auto px-6">

                <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 lg:gap-16">

                    <div class="md:w-5/12 text-center md:text-left">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-slate-800 tracking-tight mb-4">
                            Selamat Datang di Website <span class="text-green-600">Kelurahan Balang</span>
                        </h2>
                        <p class="text-slate-600 leading-relaxed">
                            Melalui portal ini, Anda dapat menjelajahi segala hal yang terkait dengan kelurahan kami.
                            Temukan informasi seputar pemerintahan, data kependudukan, potensi wilayah, hingga berita
                            dan pengumuman terbaru.
                        </p>
                        <a href="{{ route('user.gambaran-umum') }}"
                            class="mt-8 inline-block px-8 py-3 bg-green-600 text-white rounded-md font-bold transition-all duration-300 hover:bg-green-700 hover:scale-105 shadow-lg">
                            Lihat Profil Lengkap
                        </a>
                    </div>

                    <div class="md:w-7/12 w-full">
                        <div class="grid grid-cols-2 gap-6">

                            <a href="{{ route('user.gambaran-umum') }}"
                                class="group block bg-white p-6 rounded-xl shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                <div
                                    class="bg-green-100 text-green-600 rounded-lg w-12 h-12 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                                    <i class="fas fa-landmark text-2xl"></i>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg mb-1">Profil Desa</h3>
                                <p class="text-sm text-slate-500">Sejarah, visi & misi, dan struktur pemerintahan.</p>
                            </a>

                            <a href="{{ route('user.data-statistik') }}"
                                class="group block bg-white p-6 rounded-xl shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                <div
                                    class="bg-green-100 text-green-600 rounded-lg w-12 h-12 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                                    <i class="fas fa-chart-pie text-2xl"></i>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg mb-1">Infografis</h3>
                                <p class="text-sm text-slate-500">Data kependudukan dalam bentuk visual.</p>
                            </a>

                            <a href="{{ route('user.layanan') }}"
                                class="group block bg-white p-6 rounded-xl shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                <div
                                    class="bg-green-100 text-green-600 rounded-lg w-12 h-12 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                                    <i class="fas fa-file-signature text-2xl"></i>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg mb-1">Layanan Publik</h3>
                                <p class="text-sm text-slate-500">Informasi pengurusan administrasi dan surat.</p>
                            </a>

                            <a href="{{ route('user.berita') }}"
                                class="group block bg-white p-6 rounded-xl shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                                <div
                                    class="bg-green-100 text-green-600 rounded-lg w-12 h-12 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                                    <i class="fas fa-newspaper text-2xl"></i>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg mb-1">Berita Terbaru</h3>
                                <p class="text-sm text-slate-500">Kumpulan berita dan kegiatan kelurahan.</p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="berita" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800">Berita & Informasi Daerah</h2>
                    <p class="text-lg text-gray-500 mt-2">Ikuti perkembangan terbaru dari program dan kegiatan kami.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($beritas as $berita)
                        <a href="{{ route('berita.show', $berita->id) }}"
                            class="group block bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="overflow-hidden rounded-t-xl h-56">
                                <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="p-6">
                                {{-- Kategori berita --}}
                                <p class="text-blue-600 text-sm font-semibold mb-2">
                                    {{ $berita->kategori->nama_kategori }}
                                </p>

                                {{-- Judul berita --}}
                                <h3
                                    class="font-bold text-xl mb-3 text-gray-800 leading-snug group-hover:text-green-700">
                                    {{ $berita->judul }}
                                </h3>

                                {{-- Tanggal berita --}}
                                <p class="text-gray-500 text-sm">
                                    {{ \Carbon\Carbon::parse($berita->tanggal_kejadian)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
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
                                {{-- <i
                                    class="fas fa-images text-7xl text-white/80 transform group-hover:scale-110 transition-transform duration-300"></i> --}}
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

        <section id="struktur-organisasi" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-800">Struktur Organisasi</h2>
                    <p class="text-lg text-gray-500 mt-2">
                        Kenali tim yang bekerja di Kelurahan Balang, Kecamatan Binamu.
                    </p>
                </div>

                <div class="flex flex-col items-center">

                    {{-- 1. LURAH --}}
                    @if ($lurah)
                        <div class="w-full max-w-sm bg-white rounded-xl shadow-lg p-6 text-center">
                            <img class="w-32 h-32 mx-auto rounded-full object-cover ring-4 ring-green-500"
                                src="{{ $lurah->foto ? asset('storage/' . $lurah->foto) : 'https://via.placeholder.com/150' }}"
                                alt="Foto {{ $lurah->nama }}">
                            <h3 class="mt-4 text-xl font-bold text-gray-800">{{ $lurah->nama }}</h3>
                            <p class="text-green-600 font-semibold">{{ $lurah->jabatan }}</p>
                            <p class="text-sm text-gray-500 mt-1">NIP. {{ $lurah->nip }}</p>
                        </div>
                    @endif

                    {{-- Garis Penghubung --}}
                    <div class="w-px h-12 bg-gray-300 my-4"></div>

                    {{-- 2. BAWAHAN LURAH (Sekretaris, Kasi, Imam, Link) --}}
                    <div class="w-full max-w-7xl mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 items-start">

                            @foreach ($bawahanLurah->whereIn('jabatan', ['Sekretaris', 'Kasi. Pemerintahan', 'Kasi. Kesejahteraan Sosial', 'Kasi. Pembangunan']) as $pejabat)
                                <div class="bg-white rounded-xl shadow-lg p-6 h-full flex flex-col text-center">
                                    <img class="w-28 h-28 mx-auto rounded-full object-cover ring-4 ring-gray-300"
                                        src="{{ $pejabat->foto ? asset('storage/' . $pejabat->foto) : 'https://via.placeholder.com/150' }}"
                                        alt="Foto {{ $pejabat->nama }}">
                                    <h3 class="mt-4 text-lg font-bold text-gray-800">{{ $pejabat->nama }}</h3>
                                    <p class="text-gray-600 font-semibold">{{ $pejabat->jabatan }}</p>
                                    <p class="text-sm text-gray-500 mt-1">NIP. {{ $pejabat->nip }}</p>

                                    {{-- Staf di bawah Kasi --}}
                                    @if ($pejabat->children->isNotEmpty())
                                        <hr class="my-4 border-gray-200">
                                        <div class="text-left flex-grow">
                                            <h4 class="font-bold text-center text-gray-700 mb-3">Staf</h4>
                                            <ul class="space-y-2 text-sm text-gray-600">
                                                @foreach ($pejabat->children as $staf)
                                                    <li class="pl-2">- {{ $staf->nama }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        {{-- Imam & Kepala Lingkungan --}}
                        <div class="mt-12 pt-8 border-t">
                            <h3 class="text-2xl font-bold text-center mb-8 text-gray-700">Aparatur Pendukung</h3>
                            <div class="flex flex-wrap justify-center gap-6">
                                @foreach ($bawahanLurah->whereNotIn('jabatan', ['Sekretaris', 'Kasi. Pemerintahan', 'Kasi. Kesejahteraan Sosial', 'Kasi. Pembangunan']) as $pendukung)
                                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                        <h4 class="font-bold text-gray-800">{{ $pendukung->nama }}</h4>
                                        <p class="text-sm text-gray-500">{{ $pendukung->jabatan }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')


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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.hero-slider', {
            // Opsi untuk membuat slider berputar terus menerus
            loop: true,

            // Opsi untuk efek transisi (bisa 'slide' atau 'fade')
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },

            // Opsi untuk gambar bergeser otomatis
            autoplay: {
                delay: 5000, // Waktu dalam milidetik (5 detik)
                disableOnInteraction: false, // Terus berjalan meskipun di-klik
            },

            // Paginasi (titik-titik navigasi)
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Tombol navigasi (panah kiri dan kanan)
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

</body>

</html>
