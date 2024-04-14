<?php

namespace App\Http\Livewire\ProductionReport;

use App\Models\Oi;
use App\Models\ProductionReport;
use App\Models\Schedule;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $productionReport;
    public $schedule;

    public $submitButtonName;

    protected $rules = [
        'schedule' => 'required',
        'productionReport.type' => 'required',
        'productionReport.product_quantity' => 'required',
        'productionReport.date' => 'required',
        'productionReport.shift' => 'required',
        'productionReport.total_approved' => 'required',
        'productionReport.total_rejected' => 'required',
    ];

    public function mount() {
        // Check if the productionReport property is set
        if (!$this->productionReport){
            $this->productionReport = new ProductionReport(['date' => Carbon::now()->format('Y-m-d')]);
            $this->schedule = $this->productionReport->schedule_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $schedule = Schedule::find($this->schedule);

        $this->validate();
        $this->productionReport->schedule_id = $this->schedule;
        $this->productionReport->product_id = $schedule->oi->product_id;

        $this->productionReport->save();
        session()->flash('message', 'Production Report Saved!');
        return redirect()->route('production_reports.index');
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.production-report.form', ['schedules' => $schedules]);
    }
}
