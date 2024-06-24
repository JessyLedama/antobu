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
        Schema::table('products', function (Blueprint $table) {
            $table->string('more_images')->nullable();
            $table->mediumText('more_info')->nullable();
            $table->string('warranty_info')->nullable();
            $table->string('shipping_info')->nullable();
            $table->string('size')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('rating')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
