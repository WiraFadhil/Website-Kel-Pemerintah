{{-- File: resources/views/user/layanan/administrasi-kependudukan.blade.php --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Administrasi Kependudukan - Kelurahan Balang</title>

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

<body class="bg-slate-50">
    @include('layouts.navbar')

    <main>
        <section class="bg-white py-6 border-b shadow-sm">
            <div class="container mx-auto px-6">
                <h1 class="text-3xl font-bold text-slate-800">Administrasi Kependudukan</h1>
                <nav class="text-sm font-medium mt-1">
                    <a href="/" class="hover:underline text-green-600">Beranda</a><span
                        class="mx-2 text-slate-500">/</span>
                    <a href="#" class="hover:underline text-green-600">Layanan</a><span
                        class="mx-2 text-slate-500">/</span>
                    <span class="text-slate-700">Administrasi Kependudukan</span>
                </nav>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto px-6 max-w-4xl">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-800">Prosedur & Persyaratan</h2>
                    <p class="mt-2 text-lg text-slate-500">Informasi terkait pengurusan dokumen kependudukan.</p>
                </div>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg mb-8">
                    <h4 class="font-bold text-blue-800">Informasi Penting</h4>
                    <p class="text-slate-600 mt-1 text-sm">
                        Kantor Kelurahan hanya berfungsi sebagai pemberi surat pengantar.
                        Pencetakan dan penerbitan dokumen KTP, KK, dan Akta dilakukan di
                        <strong>Dinas Kependudukan dan Pencatatan Sipil (Disdukcapil)</strong> Kabupaten.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg space-y-6">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Pengurusan Kartu Keluarga (KK)</h3>
                        <p class="text-slate-600 text-sm">
                            Untuk perubahan data, penambahan/pengurangan anggota, atau pembuatan KK baru.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Pengantar Perekaman KTP-el</h3>
                        <p class="text-slate-600 text-sm">
                            Diberikan kepada warga yang telah berusia 17 tahun sebagai syarat perekaman data di
                            Disdukcapil.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Pengantar Akta Kelahiran & Kematian</h3>
                        <p class="text-slate-600 text-sm">
                            Sebagai salah satu dokumen pelengkap untuk pengajuan penerbitan akta di Disdukcapil.
                        </p>
                    </div>
                </div>

            </div>
        </section>
    </main>

    @include('layouts.footer')

    {{-- Script menu mobile (biar navbar tetap jalan) --}}
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>
