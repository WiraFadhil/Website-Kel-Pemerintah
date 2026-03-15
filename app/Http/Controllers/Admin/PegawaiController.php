<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data pegawai, diurutkan berdasarkan kolom 'urutan'
        $pegawais = Pegawai::with('parent')->orderBy('urutan')->get();
        return view('admin.struktur', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua pegawai untuk pilihan atasan
        $pegawais = Pegawai::all();
        return view('admin.tambah-pegawai', compact('pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:pegawais,id',
            'urutan' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_pegawai', 'public');
            $data['foto'] = $path;
        }


        Pegawai::create($data);

        return redirect()->route('admin.struktur')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        // Mengambil semua pegawai untuk pilihan atasan, kecuali dirinya sendiri
        $pegawais = Pegawai::where('id', '!=', $pegawai->id)->get();
        return view('admin.edit-pegawai', compact('pegawai', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'nip' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:pegawais,id',
            'urutan' => 'required|integer',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->foto && Storage::disk('public')->exists($pegawai->foto)) {
                Storage::disk('public')->delete($pegawai->foto);
            }

            // Simpan foto baru di storage/public/foto_pegawai
            $path = $request->file('foto')->store('foto_pegawai', 'public');
            $data['foto'] = $path;
        }

        $pegawai->update($data);

        return redirect()->route('admin.struktur')->with('success', 'Data pegawai berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        // Hapus foto dari storage
        if ($pegawai->foto) {
            Storage::delete($pegawai->foto);
        }
        
        $pegawai->delete();

        return redirect()->route('admin.struktur')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
