<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Form extends Component
{
    public $user;

    public $submitButtonName;

    protected $rules = [
        'user.name' => 'required',
        'user.uname' => 'required',
        'user.email' => 'required',
        'user.phone_number' => 'required',
        'user.position' => 'required',
    ];

    public function mount() {
        // Check if the user property is set
        if (!$this->user){
            $this->user = new User();

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        if (empty($this->user->password)) {
            // The user does not have a password, so set a default one
            $this->user->password = Hash::make('12345678');
        }

        $this->validate();

        $this->user->save();
        session()->flash('message', 'User Saved!');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.user.form');
    }
}
