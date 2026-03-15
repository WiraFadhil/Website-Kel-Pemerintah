<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model
{

    protected $table = 'kategori_berita';
    public function berita()
    {
        return $this->hasMany(Berita::class, 'kategori_id');
    }

}
