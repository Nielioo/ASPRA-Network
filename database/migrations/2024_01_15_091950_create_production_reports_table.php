<?php

use Carbon\Carbon;
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
        Schema::create('production_reports', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['INJECT', 'BLOW']);
            $table->date('date');
            $table->enum('shift', ['Shift 1', 'Shift 2', 'Shift 3']);
            $table->integer('total_approved');
            $table->integer('total_rejected');
            $table->string('description')->nullable();

            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')
                ->references('id')->on('schedules')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('production_reports');
    }
};
