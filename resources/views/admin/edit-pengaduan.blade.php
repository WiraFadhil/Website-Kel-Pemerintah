<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan</title>
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
            <h1 class="text-3xl font-bold text-slate-800">Edit Pengaduan</h1>
            <div class="mt-8 bg-white p-8 rounded-xl shadow-lg">
                <form action="{{ route('admin.pengaduan.update', $pengaduan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-slate-700">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama"
                                value="{{ old('nama', $pengaduan->nama) }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="telepon" class="block text-sm font-medium text-slate-700">Nomor
                                HP/WhatsApp</label>
                            <input type="tel" name="telepon" id="telepon"
                                value="{{ old('telepon', $pengaduan->telepon) }}"
                                class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>
                    <div class="mt-6">
                        <label for="judul" class="block text-sm font-medium text-slate-700">Judul
                            Laporan/Pengaduan</label>
                        <input type="text" name="judul" id="judul"
                            value="{{ old('judul', $pengaduan->judul) }}"
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div class="mt-6">
                        <label for="isi_laporan" class="block text-sm font-medium text-slate-700">Isi
                            Laporan/Pengaduan</label>
                        <textarea name="isi_laporan" id="isi_laporan" rows="5"
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('isi_laporan', $pengaduan->isi_laporan) }}</textarea>
                    </div>
                    <div class="mt-6">
                        <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                        <select name="status" id="status"
                            class="mt-1 block w-full rounded-md border-slate-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                            <option value="Baru Masuk" @selected($pengaduan->status == 'Baru Masuk')>Baru Masuk</option>
                            <option value="Sedang Diproses" @selected($pengaduan->status == 'Sedang Diproses')>Sedang Diproses</option>
                            <option value="Selesai" @selected($pengaduan->status == 'Selesai')>Selesai</option>
                        </select>
                    </div>
                    <div class="mt-8 flex justify-end space-x-4">
                        <a href="{{ route('admin.pengaduan') }}"
                            class="px-6 py-2 border rounded-md text-slate-600 hover:bg-slate-50">Batal</a>
                        <button type="submit"
                            class="px-8 py-2 bg-green-600 text-white rounded-md font-bold hover:bg-green-700">Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
