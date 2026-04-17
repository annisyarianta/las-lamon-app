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
        Schema::create('katalog', function (Blueprint $table) {
            $table->id();
            $table->string('nama_katalog');
            $table->text('mini_deskripsi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('url_gambar')->nullable();
            $table->decimal('harga', 15, 2)->default(0)->nullable();
            $table->text('output')->nullable(); 
            $table->text('target')->nullable(); 
            $table->tinyInteger('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog');
    }
};
