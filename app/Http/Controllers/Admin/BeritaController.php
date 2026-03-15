<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Berita::with('kategori')->get();
        return view('admin.berita', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('admin.tambah-berita', compact('kategori'));
    }
    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'kategori_id'     => 'required|exists:kategori_berita,id',
        'judul'           => 'required|string|max:255',
        'tanggal_kejadian'=> 'required|date',
        'isi_berita'      => 'required|string',
        'foto'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Upload foto jika ada
    if ($request->hasFile('foto')) {
        $validated['foto'] = $request->file('foto')->store('berita', 'public');
    }

    // Simpan ke database
    Berita::create($validated);

    // Redirect kembali ke halaman daftar berita
    return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
}

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $berita = Berita::findOrFail($id); // ambil data berita berdasarkan id
        $kategori = KategoriBerita::all(); // ambil semua kategori untuk dropdown
        return view('admin.edit-berita', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id'      => 'required|exists:kategori_berita,id',
            'judul'            => 'required|string|max:255',
            'tanggal_kejadian' => 'required|date',
            'isi_berita'       => 'required',
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $berita = Berita::findOrFail($id);

        $berita->kategori_id = $request->kategori_id;
        $berita->judul = $request->judul;
        $berita->tanggal_kejadian = $request->tanggal_kejadian;
        $berita->isi_berita = $request->isi_berita;

        // Cek jika ada upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto && file_exists(storage_path('app/public/'.$berita->foto))) {
                unlink(storage_path('app/public/'.$berita->foto));
            }

            // Simpan foto baru ke storage/app/public/berita
            $path = $request->file('foto')->store('berita', 'public');
            $berita->foto = $path; // path berisi "berita/namafile.jpg"
        }

        $berita->save();

        return redirect()->route('admin.berita')->with('success', 'Data berita berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
        // Cari data berita
        $berita = Berita::findOrFail($id);

        // Hapus foto jika ada
        if ($berita->foto && file_exists(storage_path('app/public/'.$berita->foto))) {
            unlink(storage_path('app/public/'.$berita->foto));
        }

        // Hapus data berita di database
        $berita->delete();

        return redirect()->route('admin.berita')->with('success', 'Data berita berhasil dihapus!');
    }

}
