<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Kabupaten Jeneponto</title>

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

<body class="bg-gray-100 text-gray-800">

    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Berita</h1>
                <nav class="text-sm font-medium">
                    <a href="{{ url('/') }}" class="hover:underline text-blue-600">Beranda</a>
                    <span class="mx-2 text-gray-500">/</span>
                    <span class="text-gray-700">Berita</span>
                </nav>
            </div>
        </section>

        <section class="container mx-auto px-6 py-12 md:py-16">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                {{-- Kita ganti semua blok statis dengan perulangan ini --}}
                @forelse ($berita as $item)
                    <a href="{{ route('berita.show', $item->id) }}"
                        class="group block bg-white rounded-xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                        <div class="overflow-hidden h-56">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-3 text-gray-800 leading-snug group-hover:text-green-700">
                                {{ $item->judul }}
                            </h3>
                            <div class="flex items-center space-x-4 text-xs text-gray-500 mt-4">
                                {{-- Ganti dengan data penulis jika ada, jika tidak, gunakan default 'Admin' --}}
                                <span class="flex items-center"><i
                                        class="fas fa-user mr-2"></i>{{ $item->penulis ?? 'Admin' }}</span>
                                <span class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal_kejadian)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                        </div>
                    </a>
                @empty
                    {{-- Tampilan ini akan muncul jika tidak ada berita sama sekali --}}
                    <div class="md:col-span-2 lg:col-span-3 text-center py-16 bg-white rounded-lg shadow-md">
                        <i class="fas fa-newspaper fa-4x text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-700">Belum Ada Berita</h3>
                        <p class="text-gray-500 mt-1">Saat ini belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse

            </div>

            <div class="mt-16">
                {{ $berita->links() }}
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

</body>

</html>
