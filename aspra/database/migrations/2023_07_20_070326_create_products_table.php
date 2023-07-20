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
            $table->id('product_id');
            $table->string('kode_produk')->unique();
            $table->text('nama_produk');
            $table->string('bahan');
            $table->string('berat');
            $table->string('volume');
            $table->string('warna');
            $table->string('packing');
            $table->string('isi_produk');
            $table->string('jenis_test');
            $table->string('outstanding')->nullable();
            $table->string('kebutuhan_per_bulan')->nullable();
            $table->date('pengajuan_terakhir')->nullable();
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
