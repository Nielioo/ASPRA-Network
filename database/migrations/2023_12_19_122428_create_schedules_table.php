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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->date('date_start');
            $table->enum('shift_start', ['Shift 1', 'Shift 2', 'Shift 3']);
            $table->date('date_end');
            $table->enum('shift_end', ['Shift 1', 'Shift 2', 'Shift 3']);
            $table->integer('output_std_per_shift');

            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')
                ->references('id')->on('machines')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('oi_id');
            $table->foreign('oi_id')
                ->references('id')->on('ois')
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
        Schema::dropIfExists('schedules');
    }
};
