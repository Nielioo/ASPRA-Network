<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
