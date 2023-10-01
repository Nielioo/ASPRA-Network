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
        Schema::create('pois', function (Blueprint $table) {
            $table->id();
            $table->string('kode_poi')->unique();
            $table->date('tanggal_pembuatan_poi');
            $table->string('nama_customer');
            $table->string('total_order');
            $table->string('lokasi_penempatan');
            $table->string('tahap_pengiriman');
            $table->string('stok_akhir');
            $table->string('permintaan_khusus');
            $table->string('verifikasi_satu')->nullable();
            $table->string('verifikasi_dua')->nullable();
            $table->string('verifikasi_tiga')->nullable();
            $table->string('verifikasi_empat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pois');
    }
};
