<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // НӨАТ
            $table->decimal('vat',   10, 2)
                  ->default(0.00)
                  ->after('price');
            // НИЙТ (price + vat)
            $table->decimal('total', 10, 2)
                  ->default(0.00)
                  ->after('vat');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['vat', 'total']);
        });
    }
};
