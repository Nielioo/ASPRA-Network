<?php

namespace App\Http\Livewire\Oi;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Verification extends Component
{
    public $oi;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function verify()
    {
        // note: temporary. delete this before release
        if ($this->user->hasRole('Admin')) {
            $this->oi->verification_one = true;
            $this->oi->verification_two = true;
            $this->oi->verification_three = true;
            $this->oi->verification_four = true;
        }

        if ($this->user->hasRole('VerifyOne')) {
            $this->oi->verification_one = true;
        } elseif ($this->user->hasRole('VerifyTwo')){
            $this->oi->verification_two = true;
        } elseif ($this->user->hasRole('VerifyThree')){
            $this->oi->verification_three = true;
        } elseif ($this->user->hasRole('VerifyFour')){
            $this->oi->verification_four = true;
        }

        $this->oi->save();

        session()->flash('message', 'Oi Verified!');
        return redirect()->route('ois.index');
    }

    public function render()
    {
        return view('livewire.oi.verification');
    }
}
