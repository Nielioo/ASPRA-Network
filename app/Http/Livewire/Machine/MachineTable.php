<?php

namespace App\Http\Livewire\Machine;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class MachineTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $machines = Machine::latest()->paginate(10);
        } else {
            $machines = Machine::where('name', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('number', 'like', '%' . $this->tableSearch . '%')
                ->paginate(10);
        }
        return view('livewire.machine.machine-table', ['machines' => $machines]);
    }
}
