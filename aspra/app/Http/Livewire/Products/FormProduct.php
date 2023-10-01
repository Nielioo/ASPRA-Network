<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class FormProduct extends Component
{
    public $product;

    protected $rules = [
        'product.kode_produk' => 'required',
        'product.nama_produk' => 'required',
        'product.kode_produk' => 'required',
        'product.nama_produk' => 'required',
        'product.bahan' => 'required',
        'product.berat' => 'required',
        'product.volume' => 'required',
        'product.warna' => 'required',
        'product.packing' => 'required',
        'product.isi_produk' => 'required',
        'product.jenis_test'  => 'required',
        'product.outstanding' => '',
        'product.kebutuhan_per_bulan' => '',
        'product.pengajuan_terakhir' => '',
    ];

    public function mount() {
        if (!$this->product){
            $this->product = new Product();
        }
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
        return view('livewire.products.form-product');
    }
}
