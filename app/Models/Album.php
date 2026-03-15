<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'slug', 'deskripsi'];

    // Relasi: Satu Album punya banyak Photo
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function cover()
    {
        return $this->hasOne(Photo::class)->where('is_cover', true);
    }

    // Helper untuk mendapatkan URL cover dengan mudah
    public function getCoverUrl()
    {
        // Cari foto yang dijadikan cover
        $cover = $this->photos()->where('is_cover', true)->first();
        
        // Jika ada, kembalikan path-nya. Jika tidak, ambil foto pertama.
        if ($cover) {
            return asset('storage/' . $cover->path);
        } elseif ($this->photos()->first()) {
            return asset('storage/' . $this->photos()->first()->path);
        }

        // Jika album kosong, kembalikan placeholder
        return 'https://placehold.co/400x300/CCCCCC/FFFFFF?text=No+Image';
    }
}
