<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Photo;

class AlbumUserController extends Controller
{
    public function show($id)
    {
        // ambil album berdasarkan id + foto-fotonya
        $album = Album::with('photos')->findOrFail($id);
        return view('user.detail-album', compact('album'));
    }

    public function albums()
    {
        $albums = Album::latest()->paginate(10); // atau sesuai kebutuhan
        return view('user.galeri', compact('albums'));
    }
}
