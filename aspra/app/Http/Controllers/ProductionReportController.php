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
        $productionReports = ProductionReport::paginate(10);
        return view('production_reports.index',compact('productionReports'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function recap()
    {
        $productionReports = ProductionReport::paginate(10);
        return view('production_reports.recap',compact('productionReports'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect to create view
        return view('production_reports.create');
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
        $productionReport = ProductionReport::findOrFail($id);

        // redirect to show view
        return view('production_reports.show',compact('productionReport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data by id
        $productionReport = ProductionReport::findOrFail($id);

        // redirect to edit view
        return view('production_reports.edit',compact('productionReport'));
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
    public function destroy(string $id)
    {
        // get data by id
        $productionReport = ProductionReport::findOrFail($id);

        // delete data
        $productionReport->delete();

        // redirect to index view
        return redirect()->route('production_reports.index')->with('success','Production Report deleted successfully');
    }
}
