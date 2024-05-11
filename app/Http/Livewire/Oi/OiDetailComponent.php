<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use Livewire\Component;

class OiDetailComponent extends Component
{
    public $oi;

    public function mount(Oi $oi)
    {
        $this->oi = $oi;
    }

    public function render()
    {
        return view('livewire.oi.oi-detail-component');
    }
}
