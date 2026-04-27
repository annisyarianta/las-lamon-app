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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('total_price', 15, 2)->nullable();
            $table->enum('status_order', ['unpaid', 'in process', 'paid', 'canceled'])->default('unpaid');
            $table->dateTime('order_date')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->string('code')->nullable();
            $table->string('proof_payment_url')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->tinyInteger('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
