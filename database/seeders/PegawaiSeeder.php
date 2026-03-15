<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel sebelum seeding
        // Kita gunakan truncate agar ID dimulai dari 1 lagi
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Pegawai::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Data berdasarkan foto struktur organisasi (versi lengkap)
        $pegawais = [
            // Level 1: Lurah (ID = 1)
            ['id' => 1, 'nama' => 'Abd. Rahman, SH.MH', 'jabatan' => 'Lurah', 'pangkat' => 'Penata Tk. 1', 'nip' => '196907052011011010', 'parent_id' => null, 'urutan' => 1],

            // Level 2: Sekretaris & Kasi (parent_id = 1)
            ['id' => 2, 'nama' => 'Musdalifanto', 'jabatan' => 'Sekretaris', 'pangkat' => 'Penata', 'nip' => '198301102010011024', 'parent_id' => 1, 'urutan' => 2],
            ['id' => 3, 'nama' => 'Nur Hichmah, S.Sos', 'jabatan' => 'Kasi. Pemerintahan', 'pangkat' => 'Penata', 'nip' => '198511032008012005', 'parent_id' => 1, 'urutan' => 3],
            ['id' => 4, 'nama' => 'Prayudi Jalante, S.Sos', 'jabatan' => 'Kasi. Kesejahteraan Sosial', 'pangkat' => 'Penata Muda', 'nip' => '198601182011021011', 'parent_id' => 1, 'urutan' => 4],
            ['id' => 5, 'nama' => 'Rafiuddin, SE', 'jabatan' => 'Kasi. Pembangunan', 'pangkat' => 'Penata Muda Tk. 1', 'nip' => '198104152008011014', 'parent_id' => 1, 'urutan' => 5],
            
            // Staf di bawah Sekretaris (parent_id = 2)
            ['id' => 6, 'nama' => 'Imran Rasul, M, SE', 'jabatan' => 'Staf Sekretariat', 'pangkat' => null, 'nip' => '198601162011011017', 'parent_id' => 2, 'urutan' => 6],
            ['id' => 7, 'nama' => 'Suparman', 'jabatan' => 'Staf Sekretariat', 'pangkat' => null, 'nip' => null, 'parent_id' => 2, 'urutan' => 7],
            ['id' => 8, 'nama' => 'Sumarni', 'jabatan' => 'Staf Sekretariat', 'pangkat' => null, 'nip' => null, 'parent_id' => 2, 'urutan' => 8],
            
            // Staf Kasi Pemerintahan (parent_id = 3)
            ['id' => 9, 'nama' => 'Hamri Makkasau', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => '198602022014121002', 'parent_id' => 3, 'urutan' => 9],
            ['id' => 10, 'nama' => 'Sermawati', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 3, 'urutan' => 10],
            ['id' => 11, 'nama' => 'Murniati', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 3, 'urutan' => 11],
            ['id' => 12, 'nama' => 'Suhiati', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 3, 'urutan' => 12],
            
            // Staf Kasi Kesejahteraan Sosial (parent_id = 4)
            ['id' => 13, 'nama' => 'Hasnawiah, S.Sos', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => '198808081991122001', 'parent_id' => 4, 'urutan' => 13],
            ['id' => 14, 'nama' => 'Darmawati', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 4, 'urutan' => 14],
            ['id' => 15, 'nama' => 'Hisnawati', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 4, 'urutan' => 15],
            ['id' => 16, 'nama' => 'Hasmawati', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 4, 'urutan' => 16],

            // Staf Kasi Pembangunan (parent_id = 5)
            ['id' => 17, 'nama' => 'Muhammad Agus Badu', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 5, 'urutan' => 17],
            ['id' => 18, 'nama' => 'Indah Suston', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 5, 'urutan' => 18],
            ['id' => 19, 'nama' => 'Lili Dwi Juliarti Syah', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 5, 'urutan' => 19],
            ['id' => 20, 'nama' => 'Khairar Aidit', 'jabatan' => 'Staf', 'pangkat' => null, 'nip' => null, 'parent_id' => 5, 'urutan' => 20],
            
            // Level Lainnya (Imam & Lingkungan) - kita set parent_id nya ke Lurah (1)
            ['id' => 21, 'nama' => 'Rabaseng, S.Pdi', 'jabatan' => 'Imam Kelurahan', 'pangkat' => null, 'nip' => null, 'parent_id' => 1, 'urutan' => 21],
            ['id' => 22, 'nama' => 'Hamzah, SE', 'jabatan' => 'Link. Lembangloe', 'pangkat' => null, 'nip' => null, 'parent_id' => 1, 'urutan' => 22],
            ['id' => 23, 'nama' => 'Muh. Yusuf Sore', 'jabatan' => 'Link. Lembangloe Barat', 'pangkat' => null, 'nip' => null, 'parent_id' => 1, 'urutan' => 23],
            ['id' => 24, 'nama' => 'Syamsuddin Gassing', 'jabatan' => 'Link. Paceko', 'pangkat' => null, 'nip' => null, 'parent_id' => 1, 'urutan' => 24],
            ['id' => 25, 'nama' => 'Sadik Azikin', 'jabatan' => 'Link. BTN Romanga', 'pangkat' => null, 'nip' => null, 'parent_id' => 1, 'urutan' => 25],
            ['id' => 26, 'nama' => 'Agus', 'jabatan' => 'Link. Bontoloe', 'pangkat' => null, 'nip' => null, 'parent_id' => 1, 'urutan' => 26],
        ];

        DB::table('pegawais')->insert($pegawais);
    }
}