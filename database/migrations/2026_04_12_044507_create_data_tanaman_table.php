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
        Schema::create('data_tanaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk')->nullable();
            $table->foreign('id_produk')->references('id')->on('produk_tanaman')->onDelete('cascade');
            $table->unsignedBigInteger('id_lokasi')->nullable();
            $table->foreign('id_lokasi')->references('id')->on('lokasi')->onDelete('cascade');
            $table->enum('status_kepemilikan', ['available', 'owned'])->default('available');
            $table->tinyInteger('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tanaman');
    }
};
