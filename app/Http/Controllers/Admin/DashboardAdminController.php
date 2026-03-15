<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Artikel;
use App\Models\Album;
use App\Models\PejabatDaerah;

class DashboardAdminController extends Controller
{
    public function dashboard()
    {
        $totalBerita = Berita::count();
        $totalArtikel = Artikel::count();
        $totalGaleri = Album::count();
        $totalPejabat = PejabatDaerah::count();

        $beritaTerbaru = Berita::latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'totalBerita', 'totalArtikel', 'totalGaleri', 'totalPejabat', 'beritaTerbaru'
        ));
    }
}
