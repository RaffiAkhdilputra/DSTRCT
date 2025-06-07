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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->integer('default_price')->default(0);
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->text('front_image')->nullable();
            $table->text('back_image')->nullable();
            $table->integer('current_rating')->default(0);
            $table->integer('total_rating')->default(0);
            $table->string('category')->nullable();
            $table->integer('stock')->default(0);
            $table->string('available_sizes')->nullable();
            $table->string('available_colors')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
