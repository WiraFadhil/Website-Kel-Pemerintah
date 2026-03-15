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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image_path'); // Untuk menyimpan path gambar
            $table->string('button_text');
            $table->string('button_link');
            $table->string('button_color_class'); // misal: 'bg-blue-600 hover:bg-blue-700'
            $table->integer('order')->default(0); // Untuk urutan slider
            $table->boolean('is_active')->default(true); // Untuk toggle tampil/tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
