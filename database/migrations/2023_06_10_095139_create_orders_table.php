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
            $table->string('order_id');
            $table->date('order_date');
            $table->integer('customer_id');
            $table->string('payment_method')->nullable();
            $table->integer('pay')->nullable();
            $table->integer('due')->nullable();
            $table->string('invoice_number');
            $table->string('order_status');
            $table->integer('sub_total');
            $table->integer('vat');
            $table->integer('total');
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
