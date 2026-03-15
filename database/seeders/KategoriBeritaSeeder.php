<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_berita')->insert([
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Pemerintahan'],
            ['nama_kategori' => 'Kunjungan'],
        ]);
    }

}
