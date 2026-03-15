<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat - Kelurahan Balang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
                <h1 class="text-3xl font-bold text-slate-800">Pengaduan Masyarakat</h1>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto px-6 max-w-4xl">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-800">Sampaikan Aspirasi Anda</h2>
                    <p class="mt-2 text-lg text-slate-500">Gunakan formulir di bawah ini untuk mengirimkan laporan,
                        keluhan, atau aspirasi Anda.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                            role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('pengaduan.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-slate-700">Nama
                                    Lengkap</label>
                                <input type="text" name="nama" id="nama"
                                    class="mt-1 block w-full rounded-md border-slate-300 bg-slate-50 px-4 py-3 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Masukkan nama lengkap Anda" required>
                            </div>
                            <div>
                                <label for="telepon" class="block text-sm font-medium text-slate-700">Nomor
                                    HP/WhatsApp</label>
                                <input type="tel" name="telepon" id="telepon"
                                    class="mt-1 block w-full rounded-md border-slate-300 bg-slate-50 px-4 py-3 shadow-sm focus:border-green-500 focus:ring-green-500"
                                    placeholder="Contoh: 081234567890" required>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="judul" class="block text-sm font-medium text-slate-700">Judul
                                Laporan/Pengaduan</label>
                            <input type="text" name="judul" id="judul"
                                class="mt-1 block w-full rounded-md border-slate-300 bg-slate-50 px-4 py-3 shadow-sm focus:border-green-500 focus:ring-green-500"
                                placeholder="Tuliskan judul singkat pengaduan Anda" required>
                        </div>
                        <div class="mt-6">
                            <label for="isi_laporan" class="block text-sm font-medium text-slate-700">Isi
                                Laporan/Pengaduan</label>
                            <textarea name="isi_laporan" id="isi_laporan" rows="5"
                                class="mt-1 block w-full rounded-md border-slate-300 bg-slate-50 px-4 py-3 shadow-sm focus:border-green-500 focus:ring-green-500"
                                placeholder="Jelaskan laporan atau pengaduan Anda secara rinci di sini..." required></textarea>
                        </div>
                        <div class="mt-8 text-right">
                            <button type="submit"
                                class="px-8 py-3 bg-green-600 text-white rounded-md font-bold transition-all duration-300 hover:bg-green-700">Kirim
                                Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    {{-- @include('layouts.footer') --}}
</body>

</html>
