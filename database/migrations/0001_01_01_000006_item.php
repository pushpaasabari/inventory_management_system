<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('item_name', 120);
            $table->string('item_hsn', 120);
            $table->string('unit_primary', 120);
            $table->string('unit_secondary', 120)->nullable();
            $table->integer('unit_conversion')->nullable();
            $table->string('item_desc', 520);
            $table->decimal('item_mrp', total: 8, places: 2);
            $table->decimal('item_purchase', total: 8, places: 2);
            $table->decimal('item_sale', total: 8, places: 2)->nullable();
            $table->decimal('item_stock', total: 8, places: 2);
            $table->string('item_created_at', 120);
            $table->string('item_updated_at', 120);
            $table->integer('item_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};