<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;

    public $tableSearch = '';

    public function render()
    {
        if ($this->tableSearch == '') {
            $products = Product::latest()->paginate(10);
        } else {
            $products = Product::where('product_code', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('name', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('material', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('weight', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('volume', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('color', 'like', '%' . $this->tableSearch . '%')
                ->orWhere('packing', 'like', '%' . $this->tableSearch . '%')
                ->latest()
                ->paginate(10);
        }

        return view('livewire.product.product-table', ['products' => $products]);
    }
}
