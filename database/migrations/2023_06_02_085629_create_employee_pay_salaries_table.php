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
        Schema::create('employee_pay_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('month');
            $table->integer('paid_amount')->nullable();
            $table->integer('due_amount')->nullable();
            $table->integer('advance_amount')->nullable();
            $table->boolean('status')->default(0);
            $table->string('advance_month')->nullable();
            $table->string('advance_year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_pay_salaries');
    }
};
