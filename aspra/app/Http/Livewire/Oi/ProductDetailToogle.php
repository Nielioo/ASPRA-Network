<?php

namespace App\Http\Livewire\Oi;

use Livewire\Component;

class ProductDetailToogle extends Component
{
    public $isOpen = false;
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.oi.product-detail-toogle');
    }
}
