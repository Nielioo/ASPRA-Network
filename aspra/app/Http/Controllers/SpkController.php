<?php

namespace App\Http\Controllers;

use App\Models\Spk;
use Illuminate\Http\Request;

class SpkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spks = Spk::paginate(10);
        return view('spks.index',compact('spks'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect to create view
        return view('spks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get data by id
        $spk = Spk::findOrFail($id);

        // redirect to show view
        return view('spks.show',compact('spk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data by id
        $spk = Spk::findOrFail($id);

        // redirect to edit view
        return view('spks.edit',compact('spk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spk $spk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data by id
        $spk = Spk::findOrFail($id);

        // delete data
        $spk->delete();

        // redirect to index view
        return redirect()->route('spks.index')->with('success','Spk deleted successfully');
    }
}
