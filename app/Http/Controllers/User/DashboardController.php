<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
// ... model lain yang Anda butuhkan ...
use App\Models\Berita;
use App\Models\Album;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index()
    {
        // Data lain tetap sama
        $beritas = Berita::latest()->take(6)->get();
        $albums = Album::with('cover', 'photos')->latest()->take(3)->get();
        $sliders = Slider::where('is_active', true)->orderBy('order', 'asc')->get();

        // --- MULAI PERUBAHAN LOGIKA PEGAWAI ---

        // Ambil Lurah
        $lurah = Pegawai::where('jabatan', 'Lurah')->first();

        // Ambil semua yang berada langsung di bawah Lurah (Sekretaris, Kasi, Imam, Link)
        // Kita gunakan relasi 'children' yang sudah ada di model Anda
        $bawahanLurah = Pegawai::where('parent_id', $lurah?->id)
                                ->with('children') // Eager load staf di bawah Kasi
                                ->orderBy('urutan', 'asc')
                                ->get();
        
        // --- SELESAI PERUBAHAN ---

        return view('dashboard', compact(
            'beritas',
            'albums',
            'sliders',
            'lurah',        // Ganti 'kadis' menjadi 'lurah'
            'bawahanLurah'  // Kirim data bawahan Lurah
        ));
    }
}