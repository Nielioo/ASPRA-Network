<?php

namespace App\Http\Livewire\ProductionReports;

use App\Models\ProductionReport;
use Livewire\Component;

class FormProductionReport extends Component
{
    public $productionReport;

    protected $rules = [
        'productionReport.kode_laporan' => 'required',
        'productionReport.setting_awal' => 'required',
        'productionReport.tanggal' => 'required',
        'productionReport.shift' => 'required',
        'productionReport.approved' => 'required',
        'productionReport.rejected' => 'required',
    ];

    public function mount() {
        if (!$this->productionReport){
            $this->productionReport = new ProductionReport();
        }
    }

    public function save()
    {
        $this->validate();
        $this->productionReport->save();
        session()->flash('message', 'Report Saved!');
        return redirect()->route('productionReports.index');
    }

    public function render()
    {
        return view('livewire.production-reports.form-production-report');
    }
}
