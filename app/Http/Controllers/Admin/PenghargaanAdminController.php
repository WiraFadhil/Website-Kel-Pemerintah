<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penghargaan;

class PenghargaanAdminController extends Controller
{
    /**
     * Tampilkan daftar penghargaan.
     */
    public function index()
    {
        // Ambil data dengan pagination
        $penghargaans = Penghargaan::orderBy('tahun', 'desc')->paginate(10);

        return view('admin.penghargaan', compact('penghargaans'));
    }

    /**
     * Form tambah penghargaan.
     */
    public function create()
    {
        return view('admin.tambah-penghargaan');
    }

    /**
     * Simpan data penghargaan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penghargaan' => 'required|string|max:255',
            'pemberi'          => 'required|string|max:255',
            'tahun'            => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        Penghargaan::create($request->all());

        return redirect()->route('admin.penghargaan-store')->with('success', 'Penghargaan berhasil ditambahkan.');
    }

    /**
     * Form edit penghargaan.
     */
    public function edit($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);

        return view('admin.edit-penghargaan', compact('penghargaan'));
    }

    /**
     * Update data penghargaan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penghargaan' => 'required|string|max:255',
            'pemberi'          => 'required|string|max:255',
            'tahun'            => 'required|digits:4|integer|min:1900|max:' . date('Y'),
        ]);

        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->update($request->all());

        return redirect()->route('admin.penghargaan')->with('success', 'Penghargaan berhasil diperbarui.');
    }

    /**
     * Hapus data penghargaan.
     */
    public function destroy($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        $penghargaan->delete();

        return redirect()->route('admin.penghargaan')->with('success', 'Penghargaan berhasil dihapus.');
    }
}
