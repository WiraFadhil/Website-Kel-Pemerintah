<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul halaman dinamis sesuai nama kategori --}}
    <title>Kategori: {{ $kategori->nama_kategori }} - Kabupaten Jeneponto</title>

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

                    {{-- Judul Kategori --}}
                    <div class="mb-8 pb-4 border-b border-gray-200">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
                            Kategori: {{ $kategori->nama_kategori }}
                        </h1>
                        <p class="mt-2 text-gray-500">Menampilkan berita yang relevan dengan kategori yang Anda pilih.
                        </p>
                    </div>

                    {{-- Daftar Artikel --}}
                    <div class="space-y-10">

                        @forelse ($berita as $item)
                            <article class="flex flex-col md:flex-row gap-6 group">
                                {{-- Gambar --}}
                                <div class="w-full md:w-1/3">
                                    <a href="{{ route('berita.show', $item->id) }}">
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                            class="w-full h-48 object-cover rounded-xl shadow-lg transition-transform duration-300 group-hover:scale-105">
                                    </a>
                                </div>

                                {{-- Konten Teks --}}
                                <div class="w-full md:w-2/3">
                                    <p class="text-sm text-gray-500 mb-2">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->translatedFormat('d F Y') }}
                                    </p>
                                    <h2 class="text-xl font-bold text-gray-800 mb-2 leading-snug">
                                        <a href="{{ route('berita.show', $item->id) }}"
                                            class="group-hover:text-blue-700 transition">
                                            {{ $item->judul }}
                                        </a>
                                    </h2>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                        {{-- Mengambil kutipan dari isi berita dan membatasinya --}}
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi_berita), 150, '...') }}
                                    </p>
                                    <a href="{{ route('berita.show', $item->id) }}"
                                        class="font-semibold text-blue-600 hover:text-blue-800 transition">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </article>
                        @empty
                            {{-- Pesan jika tidak ada berita dalam kategori ini --}}
                            <div class="text-center py-12 bg-gray-50 rounded-lg">
                                <i class="fas fa-newspaper fa-3x text-gray-400 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-700">Belum Ada Berita</h3>
                                <p class="text-gray-500 mt-1">Saat ini belum ada berita yang dipublikasikan dalam
                                    kategori ini.</p>
                            </div>
                        @endforelse

                    </div>

                    {{-- Navigasi Halaman (Pagination) --}}
                    <div class="mt-12">
                        {{ $berita->links() }}
                    </div>

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
                                @foreach ($semuaKategori as $kat)
                                    <li>
                                        {{-- Tambahkan logika untuk menandai kategori aktif --}}
                                        <a href="{{ route('user.kategori', $kat->id) }}"
                                            class="flex justify-between items-center p-2 rounded-md transition
                                            {{ $kategori->id == $kat->id ? 'bg-blue-100 text-blue-700 font-bold' : 'text-gray-700 hover:text-blue-700 hover:bg-blue-50' }}">
                                            <span><i
                                                    class="fas fa-folder-open text-blue-500 mr-3"></i>{{ $kat->nama_kategori }}</span>
                                            <span
                                                class="text-xs {{ $kategori->id == $kat->id ? 'bg-blue-200 text-blue-800' : 'bg-gray-200' }} px-2 py-0.5 rounded-full">{{ $kat->berita->count() }}</span>
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
