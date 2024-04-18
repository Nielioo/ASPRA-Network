<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifyOrder extends Component
{
    public $oi;

    protected $listeners = ['triggerConfirm' => 'confirmAction'];

    public function confirmAction($action)
    {
        $this->dispatchBrowserEvent('confirming-action', [
            'message' => 'Are you sure you want to ' . strtoupper($action) . '?',
            'action' => $action,
        ]);
    }

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
        return redirect()->route('ois.show', ['oi' => $this->oi->id]);
    }

    public function needRevision()
    {
        $verification = Verification::firstOrNew([
            'verifier_name' => Auth::user()->name,
            'oi_id' => $this->oi->id,
        ]);

        if (!$verification->exists) {
            // Only set the verifier_order if this is a new verification
            $verification->verifier_order = $this->oi->verifications()->count() + 1;
        }

        $verification->status = 'needRevision';
        $verification->save();

        $this->oi->current_verifier = Auth::user()->name;
        $this->oi->save();

        session()->flash('message', 'Oi Need Revision!');
        return redirect()->route('ois.show', ['oi' => $this->oi->id]);
    }

    public function deny()
    {
        $verification = Verification::firstOrNew([
            'verifier_name' => Auth::user()->name,
            'oi_id' => $this->oi->id,
        ]);

        if (!$verification->exists) {
            // Only set the verifier_order if this is a new verification
            $verification->verifier_order = $this->oi->verifications()->count() + 1;
        }

        $verification->status = 'unVerified';
        $verification->save();

        $this->oi->current_verifier = Auth::user()->name;
        $this->oi->save();

        session()->flash('message', 'Oi UnVerified!');
        return redirect()->route('ois.show', ['oi' => $this->oi->id]);
    }

    public function render()
    {
        return view('livewire.oi.verify-order');
    }
}
