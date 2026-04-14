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
        Schema::create('nomor_sertifikat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nomor_awal')->nullable();
            $table->integer('nomor_akhir')->nullable();
            $table->string('kerangka_penomoran')->nullable();
            $table->tinyInteger('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nomor_sertifikat');
    }
};
