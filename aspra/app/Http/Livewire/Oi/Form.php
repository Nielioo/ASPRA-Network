<?php

namespace App\Http\Livewire\Oi;

use App\Models\Oi;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $oi;
    public $product;

    public $submitButtonName;

    protected $rules = [
        'oi.product_id' => 'required',
        'oi.date_created' => 'required',
        'oi.customer_name' => 'required',
        'oi.total_order' => 'required',
        'oi.placement_location' => 'required',
        'oi.delivery_stage' => 'required',
        'oi.special_request' => '',
        'oi.verification_one' => '',
        'oi.verification_two' => '',
        'oi.verification_three' => '',
        'oi.verification_four' => '',
    ];

    public function mount() {
        // Check if the OI property is set
        if (!$this->oi){
            $this->oi = new Oi(['date_created' => Carbon::now()->format('Y-m-d')]);
            $this->product = $this->oi->product_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->validate();
        $this->oi->product_id = $this->product;

        $this->oi->save();
        session()->flash('message', 'Oi Saved!');
        return redirect()->route('ois.index');
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.oi.form', ['products' => $products,]);
    }
}
