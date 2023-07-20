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
            $table->text('kode_produk')->unique();
            $table->text('nama_produk');
            $table->text('bahan');
            $table->text('berat');
            $table->text('volume');
            $table->text('warna');
            $table->text('packing');
            $table->text('isi_produk');
            $table->text('jenis_test');
            $table->text('outstanding')->nullable();
            $table->text('kebutuhan_per_bulan')->nullable();
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
