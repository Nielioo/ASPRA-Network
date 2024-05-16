<?php

namespace App\Http\Livewire\Spk;

use App\Models\Spk;
use Livewire\Component;
use Livewire\WithPagination;

class SpkTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $spks = Spk::latest()->paginate(10);
        } else {
            $spks = Spk::whereHas('schedule', function ($query) {
                    $query->where('product_name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->orWhereHas('schedule.oi.product', function ($query) {
                    $query->where('product_code', 'like', '%' . $this->tableSearch . '%')
                        ->orWhere('name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->latest()
                ->paginate(10);
        }
        return view('livewire.spk.spk-table',['spks' => $spks]);
    }
}
