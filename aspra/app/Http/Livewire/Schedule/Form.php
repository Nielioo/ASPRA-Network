<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Machine;
use App\Models\Oi;
use App\Models\Schedule;
use Livewire\Component;

class Form extends Component
{
    public $schedule;
    public $oi;
    public $machine;

    public $oiQuery;
    public $ois;
    public $selectedOi;

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
        'schedule.output_std_per_shift' => 'required',
    ];

    public function mount() {
        // Check if the schedule property is set
        if (!$this->schedule){
            $this->schedule = new Schedule();
            $this->machine = $this->schedule->machine_id;
            $this->oi = $this->schedule->oi_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->selectedOi = $this->schedule->oi;

            $this->submitButtonName = 'Edit';
        }
    }

    public function updatedOi($value)
    {
        // Find the selected OI
        $oi = Oi::find($value);

        $this->selectedOi = $oi;
    }

    public function updateSelectedOi($oiId)
    {
        $selectedOi = Oi::with('product')->find($oiId);

        if ($selectedOi) {
            $this->selectedOi = $selectedOi;
            $this->schedule->product_name = $selectedOi->product->name;
            $this->schedule->product_quantity = $selectedOi->total_order;
            $this->resetVars();
        }
    }

    public function updatedOiQuery()
    {
        sleep(0.5);
        $this->ois = Oi::with('product')
               ->where('ois.id', 'like', '%' . $this->oiQuery . '%')
               ->orWhereHas('product', function ($query) {
                $query->where('name', 'like', '%' . $this->oiQuery . '%');
                })
               ->orWhere('customer_name', 'like', '%' . $this->oiQuery . '%')
               ->get()->toArray();
    }

    public function resetVars()
    {
        $this->oiQuery = '';
        $this->ois = [];
    }

    public function save()
    {
        $this->oi = $this->selectedOi->id;

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
