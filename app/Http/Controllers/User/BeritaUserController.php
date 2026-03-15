<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaUserController extends Controller
{

    public function index()
    {
        // Ambil data berita, urutkan dari yang terbaru
        // paginate(6) berarti 6 berita per halaman, sesuaikan jika perlu
        $berita = Berita::latest('tanggal_kejadian')->paginate(6);

        // Kirim data ke view 'berita.index'
        return view('user.berita', [
            'berita' => $berita
        ]);
    }

    public function show($id)
    {
        // Ambil berita yang sesuai
        $berita = Berita::with('kategori')->findOrFail($id);

        // Ambil 5 berita terbaru (kecuali berita yang sedang dibuka)
        $beritaTerbaru = Berita::where('id', '!=', $id)
            ->latest('tanggal_kejadian')
            ->take(5)
            ->get();

        // Ambil kategori untuk sidebar
        $kategori = KategoriBerita::with('berita')->get();

        return view('user.detail-berita', compact('berita', 'beritaTerbaru', 'kategori'));
    }
}
