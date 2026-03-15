<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KepalaDaerah;

class KepalaDaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KepalaDaerah::all();
        return view('admin.kepala-daerah', compact('data'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = KepalaDaerah::findOrFail($id);
        return view('admin.edit-kepala-daerah', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nama_istri' => 'nullable|string|max:255',
            'anak' => 'nullable|string|max:255',
            'riwayat_jabatan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // jika ada foto
        ], [
            // Pesan error custom
            'nama.required' => 'Nama wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'foto.image' => 'File harus berupa gambar (jpg, jpeg, png).',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        $kepalaDaerah = KepalaDaerah::findOrFail($id);

        // Kalau ada upload foto
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kepala-daerah', 'public');
            $kepalaDaerah->foto = $fotoPath;
        }

        $kepalaDaerah->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'nama_istri' => $request->nama_istri,
            'anak' => $request->anak,
            'riwayat_jabatan' => $request->riwayat_jabatan,
        ]);

        return redirect()->route('admin.kepala-daerah')->with('success', 'Data berhasil diupdate');
    }

}
