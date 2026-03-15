<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil lurah - Kabupaten Jeneponto</title>
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
        {{-- Breadcrumb --}}
        <section class="bg-white py-4 border-b">
            <div class="container mx-auto px-6 text-sm">
                <a href="#" class="hover:underline text-blue-600">Pemerintahan</a>
                <span class="mx-2 text-gray-500">/</span>
                <a href="#" class="hover:underline text-blue-600">Kepala Daerah</a>
                <span class="mx-2 text-gray-500">/</span>
                <span class="text-gray-700">lurah</span>
            </div>
        </section>

        {{-- Konten Utama --}}
        <section class="container mx-auto px-6 py-12 md:py-16">
            <div class="bg-white p-6 md:p-10 rounded-xl shadow-lg">
                <div class="flex flex-col md:flex-row md:space-x-12">

                    {{-- KOLOM KIRI: FOTO & IDENTITAS --}}
                    <div class="w-full md:w-1/3 lg:w-1/4 flex-shrink-0 text-center mb-8 md:mb-0">
                        <img src="{{ $lurah->foto ? asset('storage/' . $lurah->foto) : 'https://placehold.co/400x500/E2E8F0/334155?text=Foto+lurah' }}"
                            alt="Foto {{ $lurah->nama }}" class="rounded-lg shadow-md mx-auto w-64 h-80 object-cover">
                        <div class="mt-6">
                            <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">{{ $lurah->nama }}</h1>
                            <p class="text-blue-600 font-semibold text-lg mt-1">{{ $lurah->jabatan }}</p>
                        </div>
                    </div>

                    {{-- KOLOM KANAN: PROFIL LENGKAP (SESUAI GAMBAR) --}}
                    <div class="w-full md:w-2/3 lg:w-3/4">

                        {{-- Menggunakan Definition List (<dl>) yang semantik untuk pasangan key-value --}}
                        <dl class="text-base">

                            {{-- Baris Nama --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Nama</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $lurah->nama }}</dd>
                            </div>

                            {{-- Baris Tempat/Tanggal Lahir --}}
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="md:col-span-3 font-semibold text-slate-600">
                                    Tempat/Tanggal Lahir
                                </dt>
                                <dd class="md:col-span-9 text-slate-800">
                                    {{ $lurah->tempat_lahir }},
                                    {{ \Carbon\Carbon::parse($lurah->tanggal_lahir)->translatedFormat('d F Y') }}
                                </dd>
                            </div>

                            {{-- Baris Agama --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Agama</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $lurah->agama }}</dd>
                            </div>

                            {{-- Baris Jabatan --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Jabatan</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $lurah->jabatan }} Periode
                                    2025 - 2030</dd>
                            </div>

                            {{-- Baris Alamat --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Alamat</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $lurah->alamat }}</dd>
                            </div>

                            {{-- Baris Nama Istri --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Nama Istri</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $lurah->nama_istri ?? '-' }}
                                </dd>
                            </div>

                            {{-- Baris Anak --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600">Anak</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">: {{ $lurah->anak ?? '-' }}</dd>
                            </div>

                            {{-- Baris Riwayat Jabatan --}}
                            <div class="grid grid-cols-12 gap-x-4 py-3 border-t border-slate-100">
                                <dt class="col-span-4 md:col-span-3 font-semibold text-slate-600 self-start">Riwayat
                                    Jabatan</dt>
                                <dd class="col-span-8 md:col-span-9 text-slate-800">
                                    {{-- Menggunakan Ordered List (<ol>) untuk penomoran otomatis --}}
                                    <ol class="list-outside list-[decimal] space-y-1">
                                        {{-- Data placeholder, idealnya dari database --}}
                                        <li>Kepala Seksi Pembangunan Desa (2006 - 2010)</li>
                                        <li>Camat Kecamatan Binamu (2010 - 2015)</li>
                                        <li>Kepala Dinas Pendidikan dan Kebudayaan (2015 - 2020)</li>
                                        <li>Wakil lurah Jeneponto (2020 - 2025)</li>
                                        <li>lurah Jeneponto (2025 - Sekarang)</li>
                                    </ol>
                                </dd>
                            </div>
                        </dl>

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

</body>

</html>
