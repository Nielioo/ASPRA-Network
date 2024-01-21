<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'initial_settings',
        'date',
        'shift',
        'approved',
        'rejected',
    ];

    public function oi()
    {
        return $this->belongsTo(Oi::class);
    }
}
