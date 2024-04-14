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
        'verifier_name',
        'verifier_order',
        'oi_id',
    ];

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
            ->where('status', 'unVerified')
            ->orderBy('verifier_order')
            ->first();

        if ($nextVerifier) {
            // Update the current verifier in the OI table
            $this->oi->current_verifier = $nextVerifier->verifier_name;
            $this->oi->save();
        }
    }
}
