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
        'product.test_type'  => 'required',
        'product.remaining_stock'  => '',
        'product.outstanding' => '',
        'product.needs_per_month' => '',
        'product.last_order_date' => '',
    ];

    public function mount() {
        // Check if the Product property is set
        if (!$this->product){
            $this->product = new Product();

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }

        // Check if the ID exists in the route parameters
        // if(request()->route('product')) {
        //     $this->submitButtonName = 'Edit';
        // } else {
        //     $this->submitButtonName = 'Create';
        // }
    }

    public function save()
    {
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
