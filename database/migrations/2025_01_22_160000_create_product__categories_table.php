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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Category name
            $table->string('slug')->unique(); // Unique slug for SEO-friendly URLs
            $table->string('link');
            $table->integer('sort_order');
            $table->text('description')->nullable(); // Optional description
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
