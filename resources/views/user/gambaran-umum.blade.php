<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gambaran Umum - Kelurahan Balang</title>

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

<body class="bg-slate-50 text-slate-800">

    @include('layouts.navbar')
    <main>
        <section class="bg-white py-6 border-b shadow-sm">
            <div class="container mx-auto px-6">
                <h1 class="text-3xl font-bold text-slate-800">Gambaran Umum Kelurahan</h1>
                <nav class="text-sm font-medium mt-1">
                    <a href="/" class="hover:underline text-green-600">Beranda</a>
                    <span class="mx-2 text-slate-500">/</span>
                    <span class="text-slate-700">Gambaran Umum</span>
                </nav>
            </div>
        </section>

        <div class="py-16">
            <div class="container mx-auto px-6 space-y-16">

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 border-l-4 border-green-500 pl-4">Sejarah Singkat
                    </h2>
                    <div class="flex flex-col md:flex-row gap-8 items-center">
                        <div class="md:w-1/3">
                            <img src="{{ asset('images/kantor.jpg') }}" alt="Sejarah Kelurahan Balang"
                                class="rounded-lg shadow-md w-full">
                        </div>
                        <div class="md:w-2/3 text-gray-600 leading-relaxed space-y-4">
                            <p>Kelurahan Balang, yang secara harfiah berarti "Pematang Sawah" dalam bahasa setempat,
                                memiliki sejarah panjang sebagai pusat pemukiman agraris. Didirikan secara administratif
                                pada tahun 1985, wilayah ini merupakan pemekaran dari desa induk untuk meningkatkan
                                efektivitas pelayanan kepada masyarakat yang terus berkembang.</p>
                            <p>Sejak awal berdirinya, Kelurahan Balang telah menjadi saksi berbagai perubahan sosial dan
                                pembangunan infrastruktur, namun tetap mempertahankan kearifan lokal dan semangat gotong
                                royong yang diwariskan oleh para pendahulu.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Visi & Misi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                        <div class="bg-slate-50 p-6 rounded-lg">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4 flex items-center gap-3"><i
                                    class="fas fa-eye"></i> Visi</h3>
                            <blockquote class="text-gray-600 italic border-l-4 border-green-300 pl-4">"Terwujudnya
                                Kelurahan Balang yang Maju, Sejahtera, dan Berbudaya Berlandaskan Pelayanan Publik yang
                                Prima dan Partisipasi Masyarakat."</blockquote>
                        </div>
                        <div class="bg-slate-50 p-6 rounded-lg">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4 flex items-center gap-3"><i
                                    class="fas fa-bullseye"></i> Misi</h3>
                            <ol class="list-decimal list-inside text-gray-600 space-y-2">
                                <li>Meningkatkan kualitas pelayanan publik yang cepat, mudah, dan transparan.</li>
                                <li>Mengembangkan potensi ekonomi lokal melalui pemberdayaan UMKM.</li>
                                <li>Meningkatkan kualitas infrastruktur dasar dan lingkungan yang bersih serta sehat.
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-800">Struktur Organisasi</h2>
                        <p class="text-lg text-gray-500 mt-2">Aparatur Kelurahan Balang, Kecamatan Binamu.</p>
                    </div>
                    <div class="flex flex-col items-center">
                        @if ($lurah)
                            <div class="w-full max-w-xs bg-white rounded-xl border-2 border-gray-200 p-6 text-center">
                                <img class="w-28 h-28 mx-auto rounded-full object-cover ring-4 ring-green-500"
                                    src="{{ $lurah->foto ? asset('storage/' . $lurah->foto) : 'https://via.placeholder.com/150' }}"
                                    alt="Foto {{ $lurah->nama }}">
                                <h3 class="mt-4 text-lg font-bold text-gray-800">{{ $lurah->nama }}</h3>
                                <p class="text-green-600 font-semibold">{{ $lurah->jabatan }}</p>
                                @if ($lurah->nip)
                                    <p class="text-sm text-gray-500 mt-1">NIP. {{ $lurah->nip }}</p>
                                @endif
                            </div>
                        @endif
                        <div class="w-px h-10 bg-gray-300 my-4"></div>
                        <div class="w-full max-w-7xl mx-auto">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 items-start">
                                @foreach ($bawahanLurah->whereIn('jabatan', ['Sekretaris', 'Kasi. Pemerintahan', 'Kasi. Kesejahteraan Sosial', 'Kasi. Pembangunan']) as $pejabat)
                                    <div
                                        class="bg-slate-50 rounded-xl border border-gray-200 p-6 h-full flex flex-col text-center">
                                        <img class="w-24 h-24 mx-auto rounded-full object-cover ring-4 ring-white"
                                            src="{{ $pejabat->foto ? asset('storage/' . $pejabat->foto) : 'https://via.placeholder.com/150' }}"
                                            alt="Foto {{ $pejabat->nama }}">
                                        <h3 class="mt-4 text-md font-bold text-gray-800">{{ $pejabat->nama }}</h3>
                                        <p class="text-gray-600 font-semibold text-sm">{{ $pejabat->jabatan }}</p>
                                        @if ($pejabat->nip)
                                            <p class="text-xs text-gray-500 mt-1">NIP. {{ $pejabat->nip }}</p>
                                        @endif
                                        @if ($pejabat->children->isNotEmpty())
                                            <hr class="my-4 border-gray-300">
                                            <div class="text-left flex-grow">
                                                <h4 class="font-bold text-center text-gray-700 mb-3 text-sm">Staf</h4>
                                                <ul class="space-y-2 text-xs text-gray-600">
                                                    @foreach ($pejabat->children as $staf)
                                                        <li class="pl-2 border-l-2 border-gray-300">
                                                            {{ $staf->nama }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @php
                            $aparaturPendukung = $bawahanLurah->whereNotIn('jabatan', [
                                'Sekretaris',
                                'Kasi. Pemerintahan',
                                'Kasi. Kesejahteraan Sosial',
                                'Kasi. Pembangunan',
                            ]);
                        @endphp
                        @if ($aparaturPendukung->isNotEmpty())
                            <div class="w-full max-w-7xl mx-auto mt-12 pt-8 border-t border-gray-200">
                                <h3 class="text-2xl font-bold text-center mb-8 text-gray-700">Aparatur Pendukung</h3>
                                <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                                    @foreach ($aparaturPendukung as $pendukung)
                                        <div
                                            class="bg-slate-100 rounded-lg shadow-sm p-4 text-center border border-slate-200 min-w-[180px]">
                                            <h4 class="font-bold text-slate-800">{{ $pendukung->nama }}</h4>
                                            <p class="text-sm text-slate-500">{{ $pendukung->jabatan }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Peta Wilayah</h2>
                    <div class="w-full h-96 rounded-lg overflow-hidden shadow-md border">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15882.399999999999!2d119.54!3d-5.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db658601c776de1%3A0x5030bfbcaf74a70!2sJeneponto%2C%20Kec.%20Binamu%2C%20Kabupaten%20Jeneponto%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1678886400000"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <p class="text-center mt-4 text-gray-600 text-sm">Peta Administratif Wilayah Kelurahan Balang,
                        Kecamatan Binamu.</p>
                </div>

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
