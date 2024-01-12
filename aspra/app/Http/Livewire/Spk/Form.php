<?php

namespace App\Http\Livewire\Spk;

use App\Models\Spk;
use Livewire\Component;

class Form extends Component
{
    public $spk;

    public $submitButtonName;

    protected $rules = [
        'spk.file_path' => 'required',
    ];

    public function mount() {
        // Check if the spk property is set
        if (!$this->spk){
            $this->spk = new Spk();

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->validate();

        $this->spk->save();
        session()->flash('message', 'spk Saved!');
        return redirect()->route('spks.index');
    }

    public function render()
    {
        return view('livewire.spk.form');
    }
}
