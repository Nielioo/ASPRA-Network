<?php

namespace App\Http\Controllers;

use App\Models\Oi;
use Illuminate\Http\Request;

class OiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ois = Oi::latest()->paginate(10);
        return view('ois.index',compact('ois'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect to create view
        return view('ois.create');
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
        $oi = Oi::findOrFail($id);

        // redirect to show view
        return view('ois.show',compact('oi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data by id
        $oi = Oi::findOrFail($id);

        // redirect to edit view
        return view('ois.edit',compact('oi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oi $oi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data by id
        $oi = Oi::findOrFail($id);

        // delete data
        $oi->delete();

        // redirect to index view
        return redirect()->route('ois.index')->with('success','OI deleted successfully');
    }

    public function verify(string $id)
    {
        // get data by id
        $oi = Oi::findOrFail($id);

        // redirect to verify view
        return view('ois.verify',compact('oi'));
    }
}
