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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('code')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->bigInteger('price')->nullable();
            $table->bigInteger('off_price')->default(0);
            $table->integer('qty')->default(0);
            $table->longText('desc')->nullable();
            $table->string('image');
            $table->integer('most_sold')->default(0);
            $table->integer('rate')->default(0);
            $table->integer('special')->default(0);
            $table->integer('help')->default(0);
            $table->longText('help_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
