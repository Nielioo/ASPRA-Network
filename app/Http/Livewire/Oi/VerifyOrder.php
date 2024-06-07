<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifyOrder extends Component
{
    public $oi;
    public $oiIsVerified;

    // protected $listeners = ['triggerConfirm' => 'confirmVerifyOrderAction'];

    // public function confirmVerifyOrderAction($action)
    // {
    //     $this->dispatchBrowserEvent('confirming-action', [
    //         'message' => 'Are you sure you want to ' . strtoupper($action) . '?',
    //         'action' => $action,
    //     ]);
    // }

    public function mount(Oi $oi)
    {
        $this->oi = $oi;
        $this->oiIsVerified = $this->oi->verifications->contains(function ($verification) {
            return $verification->user->name === Auth::user()->name && $verification->status === 'approved';
        });
    }

    public function approve()
    {
        $verification = Verification::firstOrNew([
            'user_id' => Auth::id(),
            'oi_id' => $this->oi->id,
        ]);

        if (!$verification->exists) {
            // Only set the verifier_order if this is a new verification
            $verification->verifier_order = $this->oi->verifications()->count() + 1;
        }

        $verification->status = 'approved';
        $verification->save();

        $this->oi->current_verifier = Auth::user()->name;
        $this->oi->save();

        session()->flash('message', 'OI Approved!');
        return redirect()->route('ois.show', ['oi' => $this->oi->id]);
    }

    public function reject()
    {
        $verification = Verification::firstOrNew([
            'user_id' => Auth::id(),
            'oi_id' => $this->oi->id,
        ]);

        if (!$verification->exists) {
            // Only set the verifier_order if this is a new verification
            $verification->verifier_order = $this->oi->verifications()->count() + 1;
        }

        $verification->status = 'rejected';
        $verification->save();

        $this->oi->current_verifier = Auth::user()->name;
        $this->oi->save();

        session()->flash('message', 'OI Rejected!');
        return redirect()->route('ois.show', ['oi' => $this->oi->id]);
    }

    public function render()
    {
        return view('livewire.oi.verify-order');
    }
}
