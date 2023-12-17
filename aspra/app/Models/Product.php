<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code',
        'name',
        'material',
        'weight',
        'volume',
        'color',
        'packing',
        'product_content',
        'test_type',
        'remaining_stock',
        'outstanding',
        'needs_per_month',
        'last_order_date',
    ];
}
