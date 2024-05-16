<?php

namespace App\Http\Livewire\Schedule;

use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;

class ScheduleTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $schedules = Schedule::latest()->paginate(10);
        } else {
            $schedules = Schedule::where('product_name', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('product_quantity', 'like', '%' . $this->tableSearch . '%')
                ->orWhereHas('oi.product', function ($query) {
                    $query->where('product_code', 'like', '%' . $this->tableSearch . '%')
                        ->orWhere('name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->orWhereHas('machine', function ($query) {
                    $query->where('number', 'like', '%' . $this->tableSearch . '%')
                        ->orWhere('name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->latest()
                ->paginate(10);
        }
        return view('livewire.schedule.schedule-table',['schedules' => $schedules]);
    }
}
