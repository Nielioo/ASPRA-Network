<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'final_verifier_position',
        'reject_percentage',
    ];

    public function ois()
    {
        return $this->hasMany(Oi::class);
    }

    public function productionReports()
    {
        return $this->hasMany(ProductionReport::class);
    }
}
