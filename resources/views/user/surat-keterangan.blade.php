{{-- File: resources/views/user/layanan/surat-keterangan.blade.php --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Surat Keterangan - Kelurahan Balang</title>

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

        .rotate-180 {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body class="bg-slate-50">
    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b shadow-sm">
            <div class="container mx-auto px-6">
                <h1 class="text-3xl font-bold text-slate-800">Layanan Surat Keterangan</h1>
                <nav class="text-sm font-medium mt-1">
                    <a href="/" class="hover:underline text-green-600">Beranda</a><span
                        class="mx-2 text-slate-500">/</span>
                    <a href="#" class="hover:underline text-green-600">Layanan</a><span
                        class="mx-2 text-slate-500">/</span>
                    <span class="text-slate-700">Surat Keterangan</span>
                </nav>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto px-6 max-w-4xl">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-800">Prosedur & Persyaratan</h2>
                    <p class="mt-2 text-lg text-slate-500">Klik pada jenis surat untuk melihat detail persyaratan.</p>
                </div>

                <div class="space-y-4">
                    {{-- Surat Keterangan Domisili --}}
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200">
                        <button
                            class="faq-toggle flex justify-between items-center w-full p-5 text-left font-semibold text-lg">
                            <span>Surat Keterangan Domisili</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-content hidden p-5 pt-0 text-slate-600 space-y-4">
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-2">Persyaratan:</h4>
                                <ul class="list-disc list-inside text-sm space-y-1">
                                    <li>Surat Pengantar dari RT/RW setempat.</li>
                                    <li>Fotokopi Kartu Tanda Penduduk (KTP).</li>
                                    <li>Fotokopi Kartu Keluarga (KK).</li>
                                </ul>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-800 mb-2">Prosedur:</h4>
                                <ol class="list-decimal list-inside text-sm space-y-1">
                                    <li>Pemohon datang ke kantor kelurahan dengan membawa berkas lengkap.</li>
                                    <li>Petugas akan memverifikasi kelengkapan dan keabsahan berkas.</li>
                                    <li>Surat Keterangan Domisili akan diproses dan ditandatangani oleh Lurah.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    {{-- Surat Keterangan Usaha --}}
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200">
                        <button
                            class="faq-toggle flex justify-between items-center w-full p-5 text-left font-semibold text-lg">
                            <span>Surat Keterangan Usaha (SKU)</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-content hidden p-5 pt-0 text-slate-600 space-y-4">
                            <p class="text-sm">Silakan hubungi staf pelayanan untuk informasi detail mengenai SKU.</p>
                        </div>
                    </div>

                    {{-- Surat Pengantar Nikah --}}
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200">
                        <button
                            class="faq-toggle flex justify-between items-center w-full p-5 text-left font-semibold text-lg">
                            <span>Surat Pengantar Nikah</span>
                            <i class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="faq-content hidden p-5 pt-0 text-slate-600 space-y-4">
                            <p class="text-sm">Silakan hubungi staf pelayanan untuk informasi detail mengenai Surat
                                Pengantar Nikah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

    {{-- Script untuk FAQ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.faq-toggle');

            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const content = this.nextElementSibling;

                    // Tutup semua konten lain (biar satu-satu yang terbuka)
                    document.querySelectorAll('.faq-content').forEach(c => {
                        if (c !== content) {
                            c.classList.add('hidden');
                            c.previousElementSibling.querySelector('i').classList.remove(
                                'rotate-180');
                        }
                    });

                    // Toggle konten yang diklik
                    content.classList.toggle('hidden');

                    // Rotasi ikon panah
                    const icon = this.querySelector('i');
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>

    {{-- Script menu mobile (biar navbar tetap jalan) --}}
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
