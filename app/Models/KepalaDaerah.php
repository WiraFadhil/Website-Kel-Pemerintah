<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaDaerah extends Model
{
    protected $table = 'kepala_daerah';
    protected $fillable = [
        'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 
        'jabatan', 'alamat', 'nama_istri', 'anak', 'riwayat_jabatan'
    ];
}
