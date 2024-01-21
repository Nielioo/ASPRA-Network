<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oi extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_created',
        'customer_name',
        'total_order',
        'placement_location',
        'delivery_stage',
        'special_request',
        'verification_one',
        'verification_two',
        'verification_three',
        'verification_four',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
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
