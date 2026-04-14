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
        Schema::create('detail_order_tanaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('order')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_data_tanaman');
            $table->foreign('id_data_tanaman')->references('id')->on('data_tanaman')->onDelete('cascade');
            $table->tinyInteger('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_order_tanaman');
    }
};
