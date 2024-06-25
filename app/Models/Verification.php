<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

    protected $table = 'verifications';

    protected $fillable = [
        'status',
        'verifier_order',
        'user_id',
        'oi_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function oi()
    {
        return $this->belongsTo(Oi::class);
    }

    public function whenVerificationCompleted($status)
    {
        $this->status = $status;
        $this->save();

        // Get the next verifier
        $nextVerifier = $this->oi->verifications()
            ->where('status', 'waiting_for_approval')
            ->orderBy('verifier_order')
            ->first();

        if ($nextVerifier) {
            // Update the current verifier in the OI table
            $this->oi->current_verifier = $nextVerifier->verifier_name;
            $this->oi->save();
        }
    }
}
