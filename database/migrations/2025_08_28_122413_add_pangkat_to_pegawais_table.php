<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('pegawais', function (Blueprint $table) {
        // Tambahkan kolom 'pangkat' setelah kolom 'jabatan'
        // Dibuat nullable() agar data lama yang tidak punya pangkat tidak error
        $table->string('pangkat', 100)->nullable()->after('jabatan');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawais', function (Blueprint $table) {
            //
        });
    }
};
