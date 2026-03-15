<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        // Ambil semua data statistik
        $allStats = Statistic::all();

        // Kelompokkan data berdasarkan kolom 'group' untuk kemudahan di view
        $groupedStats = $allStats->groupBy('group');

        // Ubah setiap grup menjadi koleksi yang diindeks oleh 'key'
        $data = [];
        foreach ($groupedStats as $group => $stats) {
            $data[$group] = $stats->keyBy('key');
        }

        // Kirim data yang sudah terstruktur ke view
        return view('user.data-statistik', $data);
    }
}