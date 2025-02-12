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
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('product_category_id'); // Foreign key
            $table->string('name'); // Product name
            $table->string('slug')->unique(); // Unique slug for product pages
            $table->text('description'); // Product description
            $table->string('image')->nullable(); // Path to the product's main image
            $table->decimal('price', 10, 2)->default(0.00); // Product price
            $table->tinyInteger('status')->default(1); // 1=active, 0=inactive
            $table->int('sort_order');
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('product_category_id')
                  ->references('id')
                  ->on('product_categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
