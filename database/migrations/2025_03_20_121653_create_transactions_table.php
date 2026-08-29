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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->constrained('users');
            $table->bigInteger('order_id')->nullable()->constrained('orders');
            $table->string('code');
            $table->bigInteger('amount');
            $table->integer('status')->default(1);
            $table->integer('bank_status')->nullable();
            $table->string('track_id')->nullable();
            $table->string('bank_order_id')->nullable();
            $table->string('ref_id')->nullable();
            $table->string('trace')->nullable();
            $table->string('card')->nullable();
            $table->string('bank_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
