<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['album_id', 'path', 'description', 'is_cover'];

    // Relasi: Satu Photo milik satu Album
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
