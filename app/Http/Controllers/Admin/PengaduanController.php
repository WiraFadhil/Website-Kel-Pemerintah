<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Http\Controllers\Controller; 

class PengaduanController extends Controller
{
    /**
     * Menyimpan pengaduan baru dari masyarakat.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
        ]);

        Pengaduan::create($validatedData);

        return back()->with('success', 'Terima kasih! Laporan Anda telah berhasil dikirim.');
    }

    /**
     * Menampilkan daftar semua pengaduan untuk admin (READ).
     */
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('admin.pengaduan', compact('pengaduans'));
    }

    /**
     * Menampilkan detail dari satu pengaduan.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('admin.show-pengaduan', compact('pengaduan'));
    }

    /**
     * Menampilkan form untuk mengedit pengaduan (UPDATE part 1).
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('admin.edit-pengaduan', compact('pengaduan'));
    }

    /**
     * Memperbarui data pengaduan di database (UPDATE part 2).
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'judul' => 'required|string|max:255',
            'isi_laporan' => 'required|string',
            'status' => 'required|string|in:Baru Masuk,Sedang Diproses,Selesai',
        ]);

        $pengaduan->update($validatedData);

        return redirect()->route('admin.pengaduan')->with('success', 'Data pengaduan berhasil diperbarui!');
    }

    /**
     * Menghapus pengaduan dari database (DELETE).
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return back()->with('success', 'Data pengaduan berhasil dihapus!');
    }
}