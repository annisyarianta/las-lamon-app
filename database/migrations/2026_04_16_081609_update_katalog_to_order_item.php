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
        Schema::table('order_item', function (Blueprint $table) {
             $table->renameColumn('katalog', 'id_katalog');

            $table->unsignedBigInteger('id_katalog')->nullable()->change();

            $table->foreign('id_katalog')
                ->references('id')
                ->on('katalog')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_item', function (Blueprint $table) {
            $table->dropForeign(['id_katalog']);
            $table->renameColumn('id_katalog', 'katalog');
        });
    }
};
