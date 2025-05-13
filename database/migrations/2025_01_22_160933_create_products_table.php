<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                       // BIGINT UNSIGNED, AI
            $table->foreignId('product_category_id')            // FK → categories.id
                  ->constrained('product_categories')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->string('name');                             // VARCHAR(255)
            $table->string('slug')->unique();                   // UNIQUE slug
            $table->text('description')->nullable();            // TEXT NULL
            $table->string('image')->nullable();                // VARCHAR(255) NULL
            $table->decimal('price', 10, 2)->default(0.00);     // DECIMAL(10,2)
            $table->tinyInteger('status')->default(1);          // TINYINT(1) DEFAULT 1
            $table->timestamps();                               // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
