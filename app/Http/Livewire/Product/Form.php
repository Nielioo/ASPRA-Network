<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Form extends Component
{
    public $product;
    public $submitButtonName;

    protected $rules = [
        'product.product_code' => 'required',
        'product.name' => 'required',
        'product.material' => 'required',
        'product.weight' => 'required',
        'product.volume' => 'required',
        'product.color' => 'required',
        'product.packing' => 'required',
        'product.product_content' => 'required',
        'product.remaining_stock'  => '',
        'product.outstanding' => '',
        'product.needs_per_month' => '',
        'product.last_order_date' => '',
        'product.grand_total_rejected' => '',
    ];

    public function mount() {
        // Check if the Product property is set
        if (!$this->product){
            $this->product = new Product();
            $this->product->remaining_stock = 0;
            $this->product->outstanding = 0;
            $this->product->grand_total_rejected = 0;
            $this->product->last_order_date = null;

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->product->product_code = strtoupper($this->product->product_code);
        $this->product->name = strtoupper($this->product->name);
        $this->product->material = strtoupper($this->product->material);
        $this->product->weight = strtoupper($this->product->weight);
        $this->product->volume = strtoupper($this->product->volume);
        $this->product->color = strtoupper($this->product->color);
        $this->product->packing = strtoupper($this->product->packing);

        $this->validate();
        $this->product->save();
        session()->flash('message', 'Product Saved!');
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.product.form');
    }
}
