<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Machine;
use App\Models\Oi;
use App\Models\Schedule;
use Livewire\Component;

class Form extends Component
{
    public $schedule;
    public $machine;
    public $oi;

    public $submitButtonName;

    protected $rules = [
        'oi' => 'required',
        'machine' => 'required',
        'schedule.product_name' => 'required',
        'schedule.product_quantity' => 'required',
        'schedule.date_start' => 'required',
        'schedule.shift_start' => 'required',
        'schedule.date_end' => 'required',
        'schedule.shift_end' => 'required',
    ];

    public function mount() {

        // Check if the schedule property is set
        if (!$this->schedule){
            $this->schedule = new Schedule();
            $this->machine = $this->schedule->machine_id;
            $this->oi = $this->schedule->oi_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->validate();
        $this->schedule->machine_id = $this->machine;
        $this->schedule->oi_id = $this->oi;

        $this->schedule->save();
        session()->flash('message', 'Schedule Saved!');
        return redirect()->route('schedules.index');
    }

    public function render()
    {
        $machines = Machine::all();
        $ois = Oi::all();
        return view('livewire.schedule.form', ['machines' => $machines, 'ois' => $ois]);
    }
}
