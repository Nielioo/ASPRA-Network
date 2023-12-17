<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect to create view
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     request()->validate([
    //         'kode_produk' => 'required',
    //         'nama_produk' => 'required',
    //         'bahan' => 'required',
    //         'berat' => 'required',
    //         'volume' => 'required',
    //         'warna' => 'required',
    //         'packing' => 'required',
    //         'isi_produk' => 'required',
    //         'jenis_test'  => 'required',
    //         'outstanding',
    //         'kebutuhan_per_bulan',
    //         'pengajuan_terakhir'
    //     ]);

    //     Product::create($request->all());

    //     return redirect()->route('products.index')->with('success','Product created successfully.');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get data by id
        $product = Product::findOrFail($id);

        // redirect to show view
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data by id
        $product = Product::findOrFail($id);

        // redirect to edit view
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Product $product)
    // {
    //     request()->validate([
    //         'kode_produk' => 'required',
    //         'nama_produk' => 'required',
    //         'bahan' => 'required',
    //         'berat' => 'required',
    //         'volume' => 'required',
    //         'warna' => 'required',
    //         'packing' => 'required',
    //         'isi_produk' => 'required',
    //         'jenis_test'  => 'required',
    //         'outstanding',
    //         'kebutuhan_per_bulan',
    //         'pengajuan_terakhir'
    //     ]);

    //     $product->update($request->all());

    //     return redirect()->route('products.index')->with('success','Product updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data by id
        $product = Product::findOrFail($id);

        // delete data
        $product->delete();

        // redirect to index view
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
