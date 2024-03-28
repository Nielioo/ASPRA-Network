<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_quantity',
        'date_start',
        'shift_start',
        'date_end',
        'shift_end',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function oi()
    {
        return $this->belongsTo(Oi::class);
    }

    public function spks()
    {
        return $this->hasMany(Spk::class);
    }

    public function productionReports()
    {
        return $this->hasMany(ProductionReport::class);
    }
}
