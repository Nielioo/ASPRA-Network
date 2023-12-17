<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ois', function (Blueprint $table) {
            $table->id();
            $table->date('date_created');
            $table->string('customer_name');
            $table->integer('total_order');
            $table->string('placement_location');
            $table->string('delivery_stage');
            $table->string('special_request')->nullable();
            $table->string('verification_one')->nullable();
            $table->string('verification_two')->nullable();
            $table->string('verification_three')->nullable();
            $table->string('verification_four')->nullable();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ois');
    }
};
