<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    // Menampilkan halaman DAFTAR ALBUM (index.blade.php)
    public function index()
    {
        // Ambil semua album, dan juga relasi fotonya (untuk menghitung foto & ambil sampul)
        $albums = Album::with('photos')->latest()->get();
        return view('admin.album', compact('albums'));
    }

    // Menyimpan ALBUM BARU
    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);

        Album::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->nama) . '-' . uniqid() // Membuat slug unik
        ]);

        return back()->with('success', 'Album baru berhasil dibuat.');
    }

    // Menampilkan halaman KELOLA FOTO (show.blade.php)
    public function show(Album $album)
    {
        // Load relasi foto untuk ditampilkan di halaman show
        $album->load('photos');
        return view('admin.galeri', compact('album'));
    }

    // Memperbarui data ALBUM
    public function update(Request $request, Album $album)
    {
        $request->validate(['nama' => 'required|string|max:255']);

        $album->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->nama) . '-' . uniqid()
        ]);

        return back()->with('success', 'Album berhasil diperbarui.');
    }

    // Menghapus ALBUM (dan foto-fotonya)
    public function destroy(Album $album)
    {
        // Hapus semua foto terkait terlebih dahulu (jika ada file di storage)
        // Logika untuk menghapus file fisik bisa ditambahkan di sini

        $album->delete(); // Karena ada foreign key constraint 'onDelete('cascade')', foto akan ikut terhapus.

        return back()->with('success', 'Album berhasil dihapus.');
    }

}