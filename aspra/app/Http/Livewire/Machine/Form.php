<?php

namespace App\Http\Livewire\Machine;

use App\Models\Machine;
use Livewire\Component;

class Form extends Component
{
    public $machine;

    public $submitButtonName;

    protected $rules = [
        'machine.number' => 'required',
        'machine.name' => 'required',
    ];

    public function mount() {
        // Check if the machine property is set
        if (!$this->machine){
            $this->machine = new Machine();

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->validate();

        $this->machine->save();
        session()->flash('message', 'machine Saved!');
        return redirect()->route('machines.index');
    }

    public function render()
    {
        return view('livewire.machine.form');
    }
}
