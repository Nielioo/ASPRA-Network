<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_poi',
        'tanggal_pembuatan_poi',
        'nama_customer',
        'total_order',
        'lokasi_penempatan',
        'tahap_pengiriman',
        'stok_akhir',
        'permintaan_khusus',
        'verifikasi_satu',
        'verifikasi_dua',
        'verifikasi_tiga',
        'verifikasi_empat',
    ];

}
