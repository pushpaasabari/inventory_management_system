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
            $table->string('product_name', 120)->unique();
            $table->string('product_category', 120);
            $table->string('item_id', 120);
            $table->string('item_qty', 120);
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
        Schema::dropIfExists('product');
    }
};