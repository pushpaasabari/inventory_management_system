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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('product_name', 120);
            $table->string('product_hsn', 120);
            $table->string('product_unit', 120);
            $table->string('product_desc', 520);
            $table->integer('product_mrp');
            $table->decimal('product_purchase', total: 8, places: 2);
            $table->integer('product_sale');
            $table->decimal('product_stock', total: 8, places: 2);
            $table->string('product_created_at', 120);
            $table->string('product_updated_at', 120);
            $table->integer('product_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};