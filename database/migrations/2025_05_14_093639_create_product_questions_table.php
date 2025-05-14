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
        Schema::create('product_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
            $table->string('asker_name')->nullable();
            $table->text('question_text')->nullable();
            $table->text('answer_text')->nullable();
            $table->string('answered_by')->nullable();
            $table->boolean('status')->default(0);
            // timestamps with proper defaults:
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('answered_at')->nullable();
            $table->timestamp('updated_at')
                  ->useCurrent()
                  ->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_questions');
    }
};
