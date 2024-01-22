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
            $table->boolean('verification_one')->default(0);
            $table->boolean('verification_two')->default(0);
            $table->boolean('verification_three')->default(0);
            $table->boolean('verification_four')->default(0);

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
