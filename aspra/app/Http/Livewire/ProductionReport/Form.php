<?php

namespace App\Http\Livewire\ProductionReport;

use App\Models\Oi;
use App\Models\Product;
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
        'productionReport.date' => 'required',
        'productionReport.shift' => 'required',
        'productionReport.total_approved' => 'required',
        'productionReport.total_rejected' => 'required',
        'productionReport.description' => '',
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

        if ($this->productionReport->exists) {
            // Subtract the old total_approved from remaining_stock
            $this->productionReport->product->remaining_stock -= $this->productionReport->getOriginal('total_approved');
        }

        // Add the new total_approved to remaining_stock
        $this->productionReport->product->remaining_stock += $this->productionReport->total_approved;

        $this->productionReport->product->outstanding = $this->productionReport->schedule->oi->total_order - $this->productionReport->product->remaining_stock;

        $this->productionReport->save();
        $this->productionReport->product->save();

        session()->flash('message', 'Production Report Saved!');
        return redirect()->route('production_reports.index');
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.production-report.form', ['schedules' => $schedules]);
    }
}
