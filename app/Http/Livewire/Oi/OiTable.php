<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use Livewire\Component;
use Livewire\WithPagination;

class OiTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $ois = Oi::with('maxVerificationOrder')->latest()->paginate(10);
        } else {
            $ois = Oi::with('maxVerificationOrder')
                ->where('date_created', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('customer_name', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('placement_location', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('placement_location', 'like', '%' . $this->tableSearch . '%')
                ->orWhereHas('product', function ($query) {
                    $query->where('product_code', 'like', '%' . $this->tableSearch . '%')
                        ->orWhere('name', 'like', '%' . $this->tableSearch . '%');
                    })
                ->latest()
                ->paginate(10);
        }
        return view('livewire.oi.oi-table', ['ois' => $ois]);
    }
}
