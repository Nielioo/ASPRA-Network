<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oi extends Model
{
    use HasFactory;

    protected $fillable = [
        'oi_code',
        'date_created',
        'customer_name',
        'total_order',
        'placement_location',
        'delivery_stage',
        'test_type',
        'special_request',
        'current_verifier',
        'is_print',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function verifications()
    {
        return $this->hasMany(Verification::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function maxVerificationOrder()
    {
        return $this->hasOne(Verification::class)
                    ->selectRaw('oi_id, max(verifier_order) as max')
                    ->groupBy('oi_id');
    }

    // Auto generate 5 dummy verifications when Oi is created
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($oi) {
    //         for ($i = 1; $i <= 5; $i++) {
    //             Verification::create([
    //                 'oi_id' => $oi->id,
    //                 'status' => 'unVerified',
    //                 'verifier_name' => 'Verifier ' . $i,
    //                 'verifier_order' => $i,
    //             ]);
    //         }
    //     });
    // }

}
