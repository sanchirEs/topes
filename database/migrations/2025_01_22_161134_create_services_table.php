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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('title'); // Service title
            $table->string('slug')->unique(); // Unique slug for SEO-friendly URLs
            $table->text('description'); // Service description
            $table->string('picture');// Path to the service image
            $table->tinyInteger('status')->default(1); // 1=active/visible, 0=inactive
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
