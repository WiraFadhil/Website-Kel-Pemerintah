<?php

namespace App\Http\Controllers\User;

use App\Models\Penghargaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PenghargaanController extends Controller

{
    public function index(Request $request)
    {
        // 1. Ambil query builder dasar
        $query = Penghargaan::query();

        // 2. Cek apakah ada input filter tahun dari URL (?tahun=2023)
        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }
        
        // 3. Eksekusi query dan urutkan dari tahun terbaru
        $penghargaans = $query->orderBy('tahun', 'desc')->get();

        // 4. Ambil semua tahun unik dari database untuk mengisi dropdown
        $tahuns = Penghargaan::select('tahun')
                                ->distinct()
                                ->orderBy('tahun', 'desc')
                                ->pluck('tahun');

        // 5. Kirim semua data yang dibutuhkan ke view
        return view('user.penghargaan', [
            'penghargaans' => $penghargaans,
            'tahuns' => $tahuns
        ]);
    }
}


