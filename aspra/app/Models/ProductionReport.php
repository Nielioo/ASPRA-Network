<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'product_quantity',
        'date',
        'shift',
        'total_approved',
        'total_rejected',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
