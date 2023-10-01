<?php

namespace App\Http\Controllers;

use App\Models\ProductionReport;
use Illuminate\Http\Request;

class ProductionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productionReports = ProductionReport::latest()->paginate(5);
        return view('productionReports.index',compact('productionReports'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productionReports.create');
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
    public function show(ProductionReport $productionReport)
    {
        return view('productionReports.show', compact('productionReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductionReport $productionReport)
    {
        return view('productionReports.edit', compact('productionReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductionReport $productionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductionReport $productionReport)
    {
        $productionReport->delete();

        return redirect()->route('productionReports.index')->with('success','Report deleted successfully');
    }
}
