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
       Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->comment('Kunci unik untuk data statistik');
            $table->string('group')->comment('Grup data, cth: summary, infrastructure');
            $table->string('title')->comment('Judul/label dari data');
            $table->string('value')->comment('Nilai data');
            $table->string('unit')->nullable()->comment('Satuan dari data, cth: Titik, Unit, km');
            $table->string('notes')->nullable()->comment('Catatan tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
