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
        Schema::table('order', function (Blueprint $table) {
            $table->dateTime('tanggal_order')->nullable()->change();
            $table->dateTime('expired_at')->nullable()->after('tanggal_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->date('tanggal_order')->nullable()->change();
            $table->dropColumn('expired_at');
        });
    }
};
