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
            $table->date('delivery_stage');
            $table->string('test_type');
            $table->string('special_request')->nullable();
            $table->string('current_verifier')->nullable();

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
