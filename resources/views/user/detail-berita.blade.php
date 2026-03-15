<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - Kabupaten Jeneponto</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style type="text/tailwindcss">
        @layer base {
            body {
                font-family: 'Poppins', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    @include('layouts.navbar')

    <main class="py-16 md:py-24">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="w-full lg:w-2/3">
                    <article>
                        <div class="flex justify-between items-center mb-4">
                            <span
                                class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1 rounded-full">{{ $berita->kategori->nama_kategori }}</span>
                            <a href="{{ url('/') }}#berita" class="text-sm text-blue-600 hover:underline">&larr;
                                Kembali ke Daftar Berita</a>
                        </div>

                        {{-- Judul Berita --}}
                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3 leading-tight">
                            {{ $berita->judul }}
                        </h1>

                        {{-- Meta Info: Tanggal --}}
                        <p class="text-gray-500 mb-6">
                            <i class="fas fa-calendar-alt mr-2"></i>Dipublikasikan pada
                            {{ \Carbon\Carbon::parse($berita->tanggal_kejadian)->translatedFormat('l, d F Y') }}
                        </p>

                        {{-- Gambar Utama Berita --}}
                        <figure class="mb-8">
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
                                class="w-full h-auto object-cover rounded-xl shadow-lg">
                        </figure>

                        {{-- 
                            Isi Konten Berita 
                        --}}
                        <div
                            class="prose prose-lg max-w-none prose-p:text-gray-700 prose-headings:text-gray-900 prose-a:text-blue-600 hover:prose-a:text-blue-800">
                            {!! nl2br(e($berita->isi_berita)) !!}

                        </div>

                    </article>
                </div>

                {{-- Kolom Sidebar --}}
                <aside class="w-full lg:w-1/3">
                    <div class="sticky top-24 space-y-8">

                        {{-- Widget Berita Terbaru --}}
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-2">Berita
                                Terbaru</h3>
                            <ul class="space-y-4">
                                @foreach ($beritaTerbaru as $item)
                                    <li>
                                        <a href="{{ route('berita.show', $item->id) }}" class="group">
                                            <h4
                                                class="font-semibold text-gray-800 group-hover:text-blue-700 transition">
                                                {{ $item->judul }}</h4>
                                            <p class="text-xs text-gray-500 mt-1">
                                                {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->translatedFormat('d F Y') }}
                                            </p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Widget Kategori --}}
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md">
                            <h3 class="text-xl font-bold text-gray-800 mb-4 border-b-2 border-blue-600 pb-2">Kategori
                            </h3>
                            <ul class="space-y-2">
                                @foreach ($kategori as $kat)
                                    <li>
                                        <a href="{{ route('user.kategori', $kat->id) }}"
                                            class="flex justify-between items-center text-gray-700 hover:text-blue-700 hover:bg-blue-50 p-2 rounded-md transition">
                                            <span><i
                                                    class="fas fa-folder-open text-blue-500 mr-3"></i>{{ $kat->nama_kategori }}</span>
                                            <span
                                                class="text-xs bg-gray-200 px-2 py-0.5 rounded-full">{{ $kat->berita->count() }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
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

</body>

</html>
