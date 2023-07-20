<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'bahan', 'berat', 'volume', 'warna', 'packing', 'isi_produk', 'jenis_test', 'outstanding', 'kebutuhan_per_bulan', 'pengajuan_terakhir'
    ];
}
