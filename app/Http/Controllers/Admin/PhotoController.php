<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Simpan foto baru ke dalam album
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'path.*'   => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        foreach ($request->file('path') as $file) {
            $filePath = $file->store('photos', 'public');

            Photo::create([
                'album_id'   => $request->album_id,
                'path'       => $filePath,
                'description'=> null,
                'is_cover'   => false
            ]);
        }

        return back()->with('success', 'Foto berhasil diunggah!');
    }

    /**
     * Update deskripsi foto
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'description' => 'nullable|string|max:500'
        ]);

        $photo->update([
            'description' => $request->description
        ]);

        return back()->with('success', 'Deskripsi berhasil diperbarui!');
    }

    /**
     * Hapus foto
     */
    public function destroy(Photo $photo)
    {
        // Hapus file fisik dari storage
        if (Storage::disk('public')->exists($photo->path)) {
            Storage::disk('public')->delete($photo->path);
        }

        $photo->delete();

        return back()->with('success', 'Foto berhasil dihapus!');
    }

    /**
     * Set foto sebagai sampul album
     */
    public function setCover(Photo $photo)
    {
        // Hapus status cover pada foto lain di album yang sama
        Photo::where('album_id', $photo->album_id)->update(['is_cover' => false]);

        // Set foto ini sebagai cover
        $photo->update(['is_cover' => true]);

        return back()->with('success', 'Foto ini sekarang menjadi sampul album!');
    }
}
