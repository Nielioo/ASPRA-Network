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
            $table->integer('initial_settings');
            $table->date('date');
            $table->enum('shift', ['Shift 1', 'Shift 2', 'Shift 3']);
            $table->integer('approved');
            $table->integer('rejected');

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
        Schema::dropIfExists('production_reports');
    }
};
