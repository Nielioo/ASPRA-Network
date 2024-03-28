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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('name');
            $table->string('material');
            $table->string('weight');
            $table->string('volume');
            $table->string('color');
            $table->string('packing');
            $table->string('product_content');
            $table->integer('remaining_stock')->nullable();
            $table->integer('outstanding')->nullable();
            $table->integer('needs_per_month')->nullable();
            $table->date('last_order_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
