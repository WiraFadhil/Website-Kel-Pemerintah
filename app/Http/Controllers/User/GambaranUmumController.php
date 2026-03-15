<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class GambaranUmumController extends Controller
{
    public function gambaranUmum()
    {
        // Ambil data Lurah
        $lurah = Pegawai::where('jabatan', 'Lurah')->first();

        // Ambil semua yang berada langsung di bawah Lurah
        $bawahanLurah = Pegawai::where('parent_id', $lurah?->id)
                                ->with('children') // Eager load staf di bawah Kasi
                                ->orderBy('urutan', 'asc')
                                ->get();
        
        // Kirim data ke view gambaran-umum
        return view('user.gambaran-umum', [
            'lurah' => $lurah,
            'bawahanLurah' => $bawahanLurah,
        ]);

    }

    public function layananSuratKeterangan()
    {
        return view('user.surat-keterangan');
    }

    public function layananAdministrasi()
    {
        return view('user.administrasi-kependudukan');
    }

    public function layananPengaduan()
    {
        return view('user.pengaduan-masyarakat');
    }
}
