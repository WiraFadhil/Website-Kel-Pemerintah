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
        Schema::create('penghargaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penghargaan');
            $table->string('pemberi'); // Misal: "Kementerian Dalam Negeri"
            $table->year('tahun');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghargaans');
    }
};
