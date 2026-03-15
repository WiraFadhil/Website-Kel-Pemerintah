<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
    'kategori_id',
    'foto',
    'judul',
    'tanggal_kejadian',
    'isi_berita',
];
    //
    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }

}
