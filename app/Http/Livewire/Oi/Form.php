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

    public $productQuery;
    public $products;
    public $selectedProduct;

    public $submitButtonName;

    protected $rules = [
        'product' => 'required',
        'oi.oi_code' => '',
        'oi.date_created' => 'required',
        'oi.customer_name' => 'required',
        'oi.total_order' => 'required',
        'oi.placement_location' => 'required',
        'oi.delivery_stage' => 'required',
        'oi.test_type' => 'required',
        'oi.special_request' => '',
        'oi.is_print' => 'boolean',
    ];

    public function mount() {
        // Check if the OI property is set
        if (!$this->oi){
            $this->oi = new Oi(['date_created' => Carbon::now()->format('Y-m-d')]);
            $this->product = $this->oi->product_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->selectedProduct = $this->oi->product;

            $this->submitButtonName = 'Edit';
        }
    }

    public function updatedProduct($value)
    {
        // Find the selected Product
        $product = Product::find($value);

        $this->selectedProduct = $product;
    }

    public function updateSelectedProduct($productId)
    {
        $selectedProduct = Product::find($productId);

        if ($selectedProduct) {
            $this->selectedProduct = $selectedProduct;
            $this->resetVars();
        }
    }

    public function updatedProductQuery()
    {
        sleep(0.5);
        $this->products = Product::where('id', 'like', '%' . $this->productQuery . '%')
            ->orWhere('product_code', 'like', '%' . $this->productQuery . '%')
            ->orWhere('name', 'like', '%' . $this->productQuery . '%')
            ->get()->toArray();
    }

    public function resetVars()
    {
        $this->productQuery = '';
        $this->products = [];
    }

    public function toggleIsPrint()
    {
        // Toggle the value of 'is_print' when the checkbox is changed
        $this->oi->is_print = !$this->oi->is_print;
    }

    private function convertToRoman($number)
    {
        switch ($number) {
            case '1':
                return 'I';
            case '2':
                return 'II';
            case '3':
                return 'III';
            case '4':
                return 'IV';
            case '5':
                return 'V';
            case '6':
                return 'VI';
            case '7':
                return 'VII';
            case '8':
                return 'VIII';
            case '9':
                return 'IX';
            case '10':
                return 'X';
            case '11':
                return 'XI';
            case '12':
                return 'XII';
            default:
                return 'NONE';
        }
    }

    private function generateOiCode($oi){
        $month = date('n', strtotime($oi->date_created));
        $romanMonth = $this->convertToRoman($month);

        $year = date('Y', strtotime($oi->date_created));

        $suffix = $oi->is_print ? '/p' : '';

        return str_pad($oi->id, 3, '0', STR_PAD_LEFT).'/'.$romanMonth.'/'.$year.$suffix;
    }

    public function save()
    {

        $this->product = $this->selectedProduct;

        $this->validate();
        $this->oi->product_id = $this->product->id;
        $this->product->last_order_date = $this->oi->date_created;

        $this->oi->save();
        $this->product->save();

        $this->oi->oi_code = $this->generateOiCode($this->oi);

        $this->oi->save();

        session()->flash('message', 'Oi Saved!');
        return redirect()->route('ois.index');
    }

    public function render()
    {
        $products = Product::all();
        $this->oi->is_print = $this->oi->is_print ?? false;
        return view('livewire.oi.form', ['products' => $products,]);
    }
}
