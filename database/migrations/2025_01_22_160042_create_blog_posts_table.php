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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('author_name'); // Author name
            $table->string('title'); // Blog post title
            $table->string('slug')->unique(); // Slug for SEO-friendly URLs
            $table->text('content'); // Blog post content
            $table->string('featured_image')->nullable(); // Featured image path
            $table->tinyInteger('status')->default(1); // 1=published, 0=draft
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
