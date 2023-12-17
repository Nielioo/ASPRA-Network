<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use Carbon\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $oi;
    public $submitButtonName;

    protected $rules = [
        'oi.date_created' => 'required',
        'oi.customer_name' => 'required',
        'oi.total_order' => 'required',
        'oi.placement_location' => 'required',
        'oi.delivery_stage' => 'required',
        'oi.special_request' => '',
        'oi.verification_one' => '',
        'oi.verification_two' => '',
        'oi.verification_three' => '',
        'oi.verification_four' => '',
    ];

    public function mount() {
        // Check if the Oi property is set
        if (!$this->oi){
            $this->oi = new Oi();
            $this->oi->date_created = Carbon::now()->format('Y-m-d');
        }

        // Check if the ID exists in the route parameters
        if(request()->route('oi')) {
            $this->submitButtonName = 'Edit';
        } else {
            $this->submitButtonName = 'Create';
        }
    }

    public function save()
    {
        $this->validate();
        $this->oi->save();
        session()->flash('message', 'Oi Saved!');
        return redirect()->route('ois.index');
    }

    public function render()
    {
        return view('livewire.oi.form');
    }
}
