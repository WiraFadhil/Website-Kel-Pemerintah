<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel sebelum mengisi
        Schema::disableForeignKeyConstraints();
        DB::table('statistics')->truncate();
        Schema::enableForeignKeyConstraints();

         $data = [
            // Kategori: Ringkasan Utama (untuk kartu di halaman depan)
            ['key' => 'total_population', 'group' => 'summary', 'title' => 'Jumlah Penduduk', 'value' => '8.750', 'unit' => 'Jiwa', 'notes' => 'Data per Agustus 2025'],
            ['key' => 'total_families', 'group' => 'summary', 'title' => 'Jumlah Kepala Keluarga', 'value' => '2.512', 'unit' => 'KK', 'notes' => 'Data terverifikasi'],
            ['key' => 'area_size', 'group' => 'summary', 'title' => 'Luas Wilayah', 'value' => '4.5', 'unit' => 'km²', 'notes' => 'Berdasarkan pemetaan terakhir'],

            // Kategori: Data Kependudukan
            ['key' => 'population_density', 'group' => 'demographics', 'title' => 'Kepadatan Penduduk', 'value' => '1.944', 'unit' => 'jiwa/km²', 'notes' => null],
            ['key' => 'male_population', 'group' => 'demographics', 'title' => 'Penduduk Laki-laki', 'value' => '4.400', 'unit' => 'Jiwa', 'notes' => null],
            ['key' => 'female_population', 'group' => 'demographics', 'title' => 'Penduduk Perempuan', 'value' => '4.350', 'unit' => 'Jiwa', 'notes' => null],
            ['key' => 'productive_age_population', 'group' => 'demographics', 'title' => 'Penduduk Usia Produktif', 'value' => '68', 'unit' => '%', 'notes' => 'Usia 15-64 tahun'],

            // Kategori: Wilayah & Sosial
            ['key' => 'total_rw', 'group' => 'territory_social', 'title' => 'Jumlah Rukun Warga (RW)', 'value' => '5', 'unit' => 'RW', 'notes' => null],
            ['key' => 'total_rt', 'group' => 'territory_social', 'title' => 'Jumlah Rukun Tetangga (RT)', 'value' => '35', 'unit' => 'RT', 'notes' => null],
            ['key' => 'health_facilities', 'group' => 'territory_social', 'title' => 'Fasilitas Kesehatan', 'value' => '8', 'unit' => 'Posyandu', 'notes' => null],
            ['key' => 'education_facilities', 'group' => 'territory_social', 'title' => 'Fasilitas Pendidikan', 'value' => '5', 'unit' => 'Unit', 'notes' => 'PAUD, TK, dan SD'],

            // Kategori: Layanan Publik
            ['key' => 'avg_letters_monthly', 'group' => 'public_service', 'title' => 'Rata-rata Surat Diproses', 'value' => '150', 'unit' => 'Surat/Bulan', 'notes' => null],
            ['key' => 'social_aid_recipients', 'group' => 'public_service', 'title' => 'Penerima Bantuan Sosial', 'value' => '320', 'unit' => 'KPM', 'notes' => 'Keluarga Penerima Manfaat'],
            ['key' => 'ektp_ownership_rate', 'group' => 'public_service', 'title' => 'Kepemilikan KTP-el', 'value' => '98', 'unit' => '%', 'notes' => 'Wajib KTP'],
            ['key' => 'family_card_updates', 'group' => 'public_service', 'title' => 'Pembaruan Kartu Keluarga', 'value' => '45', 'unit' => 'KK/Bulan', 'notes' => null],

            // Kategori: Potensi Ekonomi
            ['key' => 'total_msmes', 'group' => 'economy', 'title' => 'Jumlah UMKM Terdaftar', 'value' => '150', 'unit' => 'Unit Usaha', 'notes' => null],
            ['key' => 'local_markets', 'group' => 'economy', 'title' => 'Jumlah Pasar Lokal', 'value' => '2', 'unit' => 'Lokasi', 'notes' => null],
            ['key' => 'home_industries', 'group' => 'economy', 'title' => 'Industri Rumahan', 'value' => '40', 'unit' => 'Unit', 'notes' => 'Kuliner, Kerajinan, dll.'],
            ['key' => 'tourism_spots', 'group' => 'economy', 'title' => 'Potensi Wisata Lokal', 'value' => '1', 'unit' => 'Spot', 'notes' => 'Taman Kelurahan'],
        ];

        DB::table('statistics')->insert($data);
    }
}