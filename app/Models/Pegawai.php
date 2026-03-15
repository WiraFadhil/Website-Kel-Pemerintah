<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'nip',
        'foto',
        'parent_id',
        'urutan',
    ];

    /**
     * Relasi untuk mendapatkan atasan (parent)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'parent_id');
    }

    /**
     * Relasi untuk mendapatkan semua bawahan (children)
     */
    public function children(): HasMany
    {
        return $this->hasMany(Pegawai::class, 'parent_id')->orderBy('urutan');
    }
}