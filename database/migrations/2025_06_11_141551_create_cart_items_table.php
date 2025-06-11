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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);

            // Specify shorter lengths for 'size' and 'color'
            $table->string('size')->nullable();
            $table->string('color')->nullable();

            $table->timestamps();

            // The unique constraint on the shorter columns will now fit within the limit
            $table->unique(['cart_id', 'product_id', 'size', 'color'], 'cart_item_unique');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};