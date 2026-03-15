<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Umum - Kelurahan Balang</title>

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
                <h1 class="text-3xl font-bold text-slate-800">Layanan Publik Kelurahan</h1>
                <nav class="text-sm font-medium mt-1">
                    <a href="/" class="hover:underline text-green-600">Beranda</a>
                    <span class="mx-2 text-slate-500">/</span>
                    <span class="text-slate-700">Layanan</span>
                </nav>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="md:w-1/2">
                        <h2 class="text-4xl font-extrabold text-slate-800 mb-4">Komitmen Kami Untuk Melayani</h2>
                        <p class="text-slate-600 leading-relaxed mb-6">
                            Pemerintah Kelurahan Balang berkomitmen untuk memberikan pelayanan administrasi yang cepat,
                            mudah, dan transparan bagi seluruh masyarakat. Temukan berbagai jenis layanan yang kami
                            sediakan di bawah ini.
                        </p>
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                            <h4 class="font-bold text-green-800">Jam Operasional Pelayanan</h4>
                            <ul class="text-slate-600 mt-2 text-sm space-y-1">
                                <li><strong>Senin - Kamis:</strong> 08:00 - 15:00 WITA</li>
                                <li><strong>Jumat:</strong> 08:00 - 11:00 WITA</li>
                                <li><strong>Sabtu, Minggu & Hari Libur:</strong> Tutup</li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:w-1/2">
                        <img src="https://via.placeholder.com/600x400.png/a7f3d0/333333?text=Pelayanan+Masyarakat"
                            alt="Layanan Kelurahan Balang" class="rounded-xl shadow-lg w-full">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-800">Jenis Layanan</h2>
                    <p class="mt-2 text-lg text-slate-500 max-w-2xl mx-auto">Pilih jenis layanan yang Anda butuhkan
                        untuk melihat persyaratan dan prosedur.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="bg-slate-50 border border-slate-200 rounded-xl shadow-md p-8 flex flex-col">
                        <div
                            class="bg-green-100 text-green-600 rounded-lg w-14 h-14 flex items-center justify-center mb-5">
                            <i class="fas fa-file-alt text-3xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-xl mb-3">Surat Keterangan</h3>
                        <p class="text-slate-500 text-sm flex-grow">Pengurusan surat keterangan domisili, usaha, tidak
                            mampu (SKTM), dan lainnya.</p>
                        <a href="{{ route('user.surat-keterangan') }}"
                            class="mt-6 inline-block px-6 py-2 bg-green-600 text-white rounded-md font-semibold text-center transition-colors hover:bg-green-700">Lihat
                            Detail</a>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-xl shadow-md p-8 flex flex-col">
                        <div
                            class="bg-blue-100 text-blue-600 rounded-lg w-14 h-14 flex items-center justify-center mb-5">
                            <i class="fas fa-users text-3xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-xl mb-3">Administrasi Kependudukan</h3>
                        <p class="text-slate-500 text-sm flex-grow">Layanan terkait pengurusan Kartu Keluarga (KK), KTP,
                            Akta Kelahiran, dan Kematian.</p>
                        <a href="{{ route('user.administrasi-kependudukan') }}"
                            class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white rounded-md font-semibold text-center transition-colors hover:bg-blue-700">Lihat
                            Detail</a>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-xl shadow-md p-8 flex flex-col">
                        <div class="bg-red-100 text-red-600 rounded-lg w-14 h-14 flex items-center justify-center mb-5">
                            <i class="fas fa-bullhorn text-3xl"></i>
                        </div>
                        <h3 class="font-bold text-slate-800 text-xl mb-3">Pengaduan Masyarakat</h3>
                        <p class="text-slate-500 text-sm flex-grow">Sampaikan aspirasi, laporan, atau keluhan Anda
                            terkait fasilitas dan layanan publik.</p>
                        <a href="{{ route('user.pengaduan') }}"
                            class="mt-6 inline-block px-6 py-2 bg-red-600 text-white rounded-md font-semibold text-center transition-colors hover:bg-red-700">Buat
                            Laporan</a>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-800">Pertanyaan Umum (FAQ)</h2>
                    <p class="mt-2 text-lg text-slate-500 max-w-2xl mx-auto">Jawaban cepat untuk pertanyaan yang paling
                        sering diajukan oleh masyarakat.</p>
                </div>

                <div class="max-w-3xl mx-auto space-y-4">
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200">
                        <button class="faq-toggle flex justify-between items-center w-full p-5 text-left font-semibold">
                            <span>Apa saja dokumen umum yang harus dibawa?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-content hidden p-5 pt-0 text-slate-600">
                            <p>Untuk sebagian besar layanan, Anda disarankan untuk selalu membawa dokumen asli dan
                                fotokopi KTP (Kartu Tanda Penduduk) dan KK (Kartu Keluarga) sebagai identitas dasar.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200">
                        <button class="faq-toggle flex justify-between items-center w-full p-5 text-left font-semibold">
                            <span>Berapa lama proses pembuatan surat keterangan?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-content hidden p-5 pt-0 text-slate-600">
                            <p>Jika semua persyaratan sudah lengkap dan pejabat yang berwenang berada di tempat, proses
                                pembuatan surat keterangan umumnya dapat diselesaikan dalam waktu 15-30 menit.</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200">
                        <button class="faq-toggle flex justify-between items-center w-full p-5 text-left font-semibold">
                            <span>Apakah ada biaya untuk layanan administrasi?</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-content hidden p-5 pt-0 text-slate-600">
                            <p>Sesuai dengan peraturan yang berlaku, sebagian besar layanan administrasi kependudukan di
                                tingkat kelurahan tidak dipungut biaya (GRATIS), kecuali ada retribusi daerah yang
                                diatur secara resmi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.faq-toggle');
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const content = toggle.nextElementSibling;
                    const icon = toggle.querySelector('i');

                    // Tutup semua FAQ lain yang terbuka
                    document.querySelectorAll('.faq-content').forEach(item => {
                        if (item !== content && !item.classList.contains('hidden')) {
                            item.classList.add('hidden');
                            item.previousElementSibling.querySelector('i').classList.remove(
                                'rotate-180');
                        }
                    });

                    // Buka/tutup FAQ yang diklik
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>

</html>
