<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;

class KategoriUserController extends Controller
{
    /**
     * Menampilkan halaman daftar berita berdasarkan kategori.
     *
     * @param  \App\Models\KategoriBerita  $kategori
     * @return \Illuminate\View\View
     */
    public function show(KategoriBerita $kategori)
    {
        // Ambil berita yang termasuk dalam kategori ini, urutkan dari yang terbaru, dan gunakan pagination.
        $berita = Berita::where('kategori_id', $kategori->id)
                        ->latest('tanggal_kejadian') // Mengurutkan berdasarkan tanggal
                        ->paginate(5); // Menampilkan 5 berita per halaman

        // Ambil data untuk sidebar
        $beritaTerbaru = Berita::latest('tanggal_kejadian')->take(5)->get();
        $semuaKategori = KategoriBerita::withCount('berita')->orderBy('nama_kategori')->get();

        // Kirim semua data ke view
        return view('user.kategori', [
            'kategori' => $kategori,            // Kategori yang sedang aktif
            'berita' => $berita,                // Daftar berita di kategori ini (dengan pagination)
            'beritaTerbaru' => $beritaTerbaru,  // Untuk widget sidebar
            'semuaKategori' => $semuaKategori   // Untuk widget sidebar
        ]);
    }
}
