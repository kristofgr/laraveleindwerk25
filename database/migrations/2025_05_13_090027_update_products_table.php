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
        // add foreign id column to the products table
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // remove column category_id from the products table
        Schema::table('products', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
            // $table->dropColumn('category_id');
        });
    }
};
