<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Livewire\Component;

class ScheduleSearchBar extends Component
{

    public $query;
    public $schedules;

    public $scheduleId;
    public $selectedSchedule;

    public function mount($schedules)
    {
        $this->schedules = $schedules;
    }

    public function resetVars()
    {
        $this->query = '';
        $this->schedules = [];
    }

    public function updateSelectedSchedule($scheduleId)
    {
        $this->scheduleId = $scheduleId;

        $selectedSchedule = Schedule::find($scheduleId);

        if ($selectedSchedule) {
            $this->selectedSchedule = $selectedSchedule->product_name;
            $this->resetVars();
        }
    }

    public function updatedQuery()
    {
        sleep(0.5);
        $this->schedules = Schedule::where('id', 'like', '%' . $this->query . '%')
            ->orWhere('product_name', 'like', '%' . $this->query . '%')
            ->orWhere('date_start', 'like', '%' . $this->query . '%')
            ->get()->toArray();
    }

    public function render()
    {
        return view('livewire.schedule.schedule-search-bar');
    }
}
