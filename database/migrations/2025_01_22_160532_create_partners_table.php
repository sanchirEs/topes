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
        Schema::create('partners', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Partner or sponsor name
            $table->string('logo')->nullable(); // Path to partner's logo image
            $table->string('link')->nullable(); // Optional URL to partner's site
            $table->tinyInteger('status')->default(1); // 1=active, 0=inactive
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
