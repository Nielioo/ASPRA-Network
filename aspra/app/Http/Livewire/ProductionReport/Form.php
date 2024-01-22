<?php

namespace App\Http\Livewire\ProductionReport;

use App\Models\Oi;
use App\Models\ProductionReport;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $productionReport;
    public $oi;

    public $submitButtonName;

    protected $rules = [
        'oi' => 'required',
        'productionReport.initial_settings' => 'required',
        'productionReport.date' => 'required',
        'productionReport.shift' => 'required',
        'productionReport.approved' => 'required',
        'productionReport.rejected' => 'required',
    ];

    public function mount() {
        // Check if the productionReport property is set
        if (!$this->productionReport){
            $this->productionReport = new ProductionReport(['date' => Carbon::now()->format('Y-m-d')]);
            $this->oi = $this->productionReport->oi_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->validate();
        $this->productionReport->oi_id = $this->oi;

        $this->productionReport->save();
        session()->flash('message', 'Production Report Saved!');
        return redirect()->route('production_reports.index');
    }

    public function render()
    {
        $ois = Oi::all();
        return view('livewire.production-report.form', ['ois' => $ois]);
    }
}
