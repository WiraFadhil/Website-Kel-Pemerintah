<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen bg-gray-200">
        @include('layouts.aside')
        <div class="container mx-auto px-6 py-8 max-w-4xl">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-slate-800">Detail Pengaduan</h1>
                <a href="{{ route('admin.pengaduan') }}" class="text-green-600 hover:underline">&larr; Kembali ke
                    Daftar</a>
            </div>
            <div class="mt-8 bg-white p-8 rounded-xl shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <h3 class="text-lg font-semibold text-slate-800 border-b pb-2">Data Pelapor</h3>
                        <div class="mt-4 space-y-3 text-sm">
                            <p><strong class="block text-slate-500">Nama:</strong> {{ $pengaduan->nama }}</p>
                            <p><strong class="block text-slate-500">Telepon/WA:</strong> {{ $pengaduan->telepon }}</p>
                            <p><strong class="block text-slate-500">Tanggal Lapor:</strong>
                                {{ $pengaduan->created_at->format('d F Y, H:i') }}</p>
                            <p><strong class="block text-slate-500">Status:</strong>
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-xs rounded-full {{ $pengaduan->status == 'Selesai' ? 'bg-green-100 text-green-700' : ($pengaduan->status == 'Sedang Diproses' ? 'bg-yellow-100 text-yellow-700' : 'bg-blue-100 text-blue-700') }}">
                                    {{ $pengaduan->status }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <h3 class="text-lg font-semibold text-slate-800 border-b pb-2">Isi Laporan</h3>
                        <div class="mt-4 space-y-3">
                            <h4 class="font-bold text-slate-700">{{ $pengaduan->judul }}</h4>
                            <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-wrap">
                                {{ $pengaduan->isi_laporan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
