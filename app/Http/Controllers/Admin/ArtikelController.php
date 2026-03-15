<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Artikel::all();
        return view('admin.artikel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cukup tampilkan view-nya saja
        return view('admin.tambah-artikel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'isi' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Wajib diisi saat membuat
        ]);

        // Simpan gambar dan dapatkan path-nya
        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('artikel-images', 'public');
        }

        // Buat record baru di database
        Artikel::create($validatedData);

        return redirect()->route('admin.artikel')->with('success', 'Artikel baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.edit-artikel', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // gambar opsional
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar) {
                Storage::delete('public/' . $artikel->gambar);
            }
            // Simpan gambar baru
            $validatedData['gambar'] = $request->file('gambar')->store('artikel-images', 'public');
        }

        $artikel->update($validatedData);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Jika ada gambar, hapus dari storage
        if ($artikel->gambar && \Storage::exists('public/' . $artikel->gambar)) {
            \Storage::delete('public/' . $artikel->gambar);
        }

        // Hapus data artikel dari database
        $artikel->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus');
    }

}
