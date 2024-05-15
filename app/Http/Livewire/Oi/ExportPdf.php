<?php

namespace App\Http\Livewire\Oi;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

class ExportPdf extends Component
{
    public $oi;

    public function mount($oi)
    {
        $this->oi = $oi;
    }

    public function exportPdf()
    {
        $date = date('Ymd');
        $microtime = round(microtime(true) * 1000);
        $filename = "OI_Report_" . $this->oi->id . "_" . $date . "_" . $microtime . ".pdf";

        $pdf = Pdf::loadView('livewire.oi.oi-report', ['oi' => $this->oi, 'product' => $this->oi->product])->setPaper(['0', '0', '841.89', '1000']);
        return response()->streamDownload(
            fn () => print $pdf->output(),
            $filename
        );
    }

    public function render()
    {
        return view('livewire.oi.export-pdf');
    }
}
