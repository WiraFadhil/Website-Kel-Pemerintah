<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Pengaduan Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        <style>body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex h-screen bg-gray-200">
        @include('layouts.aside')
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-md p-4 flex justify-between items-center z-10">
                <button id="menu-toggle" class="md:hidden text-gray-600" aria-label="Buka Menu">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">Pengaduan Masyarakat</h2>
                <div class="flex items-center space-x-4">
                    <span class="hidden sm:inline text-gray-600">Admin</span>
                    <img class="h-10 w-10 rounded-full object-cover"
                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin123" alt="Admin Avatar">
                </div>
            </header>
            <div class="container mx-auto px-6 py-8">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <h1 class="text-3xl font-bold text-slate-800">Daftar Pengaduan Masuk</h1>
                <p class="mt-1 text-slate-600">Berikut adalah semua laporan yang telah dikirim oleh masyarakat.</p>

                <div class="mt-8 bg-white rounded-xl shadow-lg overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Nama Pelapor</th>
                                <th scope="col" class="px-6 py-3">Judul Laporan</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengaduans as $pengaduan)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $pengaduan->created_at->format('d M Y, H:i') }}</td>
                                    <td class="px-6 py-4">{{ $pengaduan->nama }}</td>
                                    <td class="px-6 py-4">{{ $pengaduan->judul }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full
                                    @if ($pengaduan->status == 'Baru Masuk') bg-blue-100 text-blue-800
                                    @elseif ($pengaduan->status == 'Sedang Diproses') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800 @endif">
                                            {{ $pengaduan->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 flex items-center space-x-3">
                                        <a href="{{ route('admin.show-pengaduan', $pengaduan->id) }}"
                                            class="font-medium text-blue-600 hover:underline">Detail</a>

                                        <a href="{{ route('admin.pengaduan.edit', $pengaduan->id) }}"
                                            class="font-medium text-green-600 hover:underline">Edit</a>

                                        <form action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-8 text-gray-500">Belum ada data pengaduan
                                        yang
                                        masuk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
