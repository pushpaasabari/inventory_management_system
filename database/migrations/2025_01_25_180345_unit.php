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
        Schema::create('unit', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('unit_primary', 120)->unique();
            $table->string('unit_pri_short', 120)->unique();
            $table->string('unit_secondary', 120)->nullable();
            $table->string('unit_sec_short', 120)->nullable();
            $table->integer('unit_conversion')->nullable(); 
            $table->string('unit_created_at', 120);
            $table->string('unit_updated_at', 120);
            $table->integer('unit_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit');
    }
};