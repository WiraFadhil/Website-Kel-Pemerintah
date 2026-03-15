<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PejabatDaerah extends Model
{
    protected $table = 'pejabat_daerahs';
    protected $fillable = [
    'nama',
    'tempat_lahir',
    'tanggal_lahir',
    'agama',
    'jabatan',
    'alamat',
    'anak',
    'foto',
    'nama_istri',
    'riwayat_jabatan'
];
}
