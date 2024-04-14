<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifyOrder extends Component
{
    public $oi;

    public function mount(Oi $oi)
    {
        $this->oi = $oi;
    }

    public function verify()
    {
        $verification = Verification::firstOrNew([
            'verifier_name' => Auth::user()->name,
            'oi_id' => $this->oi->id,
        ]);

        if (!$verification->exists) {
            // Only set the verifier_order if this is a new verification
            $verification->verifier_order = $this->oi->verifications()->count() + 1;
        }

        $verification->status = 'verified';
        $verification->save();

        $this->oi->current_verifier = Auth::user()->name;
        $this->oi->save();

        session()->flash('message', 'Oi Verified!');
        return redirect()->route('ois.index');
    }

    public function render()
    {
        return view('livewire.oi.verify-order');
    }
}
