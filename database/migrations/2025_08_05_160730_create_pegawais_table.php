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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jabatan', 100); // e.g., "Kepala Dinas", "Pranata Komputer"
            $table->string('nip', 50)->nullable();
            $table->string('foto')->nullable();
            
            // Kolom untuk hierarki (atasan)
            $table->unsignedBigInteger('parent_id')->nullable(); 
            $table->foreign('parent_id')->references('id')->on('pegawais')->onDelete('set null');

            // Kolom untuk sorting
            $table->integer('urutan')->default(0); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
