<?php

namespace App\Http\Livewire\Schedule;

use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportPdf extends Component
{
    public $schedule;

    public function mount($schedule)
    {
        $this->schedule = $schedule;
    }

    public function scheduleExportPdf()
    {
        $date = date('Ymd');
        $microtime = round(microtime(true) * 1000);
        $filename = "SPK_Schedule_Report_" . $this->schedule->oi->id . "_" . $date . "_" . $microtime . ".pdf";

        $pdf = Pdf::loadView('livewire.schedule.schedule-report', ['schedule' => $this->schedule])->setPaper(['0', '0', '841.89', '1000']);
        return response()->streamDownload(
            fn () => print $pdf->output(),
            $filename
        );
    }

    public function render()
    {
        return view('livewire.schedule.export-pdf');
    }
}
