<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Livewire\Component;

class ScheduleDetailComponent extends Component
{
    public $schedule;

    public function mount(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function render()
    {
        return view('livewire.schedule.schedule-detail-component');
    }
}
