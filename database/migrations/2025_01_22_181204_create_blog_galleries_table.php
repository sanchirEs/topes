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
        Schema::create('blog_galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_post_id'); // ✅ FIXED
            $table->string('picture');
            $table->timestamps();

            // ✅ Add foreign key constraint (assuming `blog_post_id` references `blog_posts` table)
            $table->foreign('blog_post_id')
                  ->references('id')
                  ->on('blog_posts')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_galleries');
    }
};
