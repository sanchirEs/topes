<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();                                // BIGINT UNSIGNED, AI, PK
            $table->string('name', 100);                 // VARCHAR(100) NOT NULL
            $table->string('slug', 100)->unique();       // UNIQUE
            $table->text('description')->nullable();     // TEXT NULL
            $table->tinyInteger('status')->default(1);   // TINYINT(1) DEFAULT 1
            $table->timestamps();                        // created_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
