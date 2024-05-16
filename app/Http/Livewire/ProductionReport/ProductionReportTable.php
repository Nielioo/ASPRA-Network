<?php

namespace App\Http\Livewire\ProductionReport;

use App\Models\ProductionReport;
use Livewire\Component;
use Livewire\WithPagination;

class ProductionReportTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $productionReports = ProductionReport::latest()->paginate(10);
        } else {
            $productionReports = ProductionReport::where('type', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('date', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('shift', 'like', '%' . $this->tableSearch . '%')
                ->orWhereHas('product', function ($query) {
                    $query->where('product_code', 'like', '%' . $this->tableSearch . '%')
                        ->orWhere('name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->orWhereHas('schedule', function ($query) {
                    $query->where('product_name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->latest()
                ->paginate(10);
        }
        return view('livewire.production-report.production-report-table',['productionReports' => $productionReports]);
    }
}
