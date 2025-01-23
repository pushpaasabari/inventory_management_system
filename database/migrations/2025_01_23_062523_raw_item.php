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
        Schema::create('raw_item', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('raw_item_name', 120);
            $table->string('raw_item_hsn', 120);
            $table->string('raw_item_unit', 120);
            $table->string('raw_item_desc', 520);
            $table->integer('raw_item_mrp');
            $table->integer('raw_item_purchase');
            $table->integer('raw_item_sale');
            $table->integer('raw_item_stock');
            $table->string('raw_item_created_at', 120);
            $table->string('raw_item_updated_at', 120);
            $table->integer('raw_item_status');
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