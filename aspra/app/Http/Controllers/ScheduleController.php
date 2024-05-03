<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::latest()->paginate(10);
        return view('schedules.index',compact('schedules'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function recap()
    {
        $schedules = Schedule::latest()->paginate(10);
        return view('schedules.recap',compact('schedules'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function exportToExcel()
    {
        // Turn off output buffering
        ob_end_clean();

        $schedules = Schedule::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['No. Mesin', 'Nama Mesin', 'Nama Produk', 'Jumlah yang ingin diproduksi', 'Output STD / Shift', 'Tanggal Mulai Produksi', 'Shift Mulai Produksi', 'Tanggal Selesai Produksi', 'Shift Selesai Produksi'];
        $sheet->fromArray([$headers], NULL, 'A1');

        $row = 2;
        foreach ($schedules as $schedule) {
            $values = [
                $schedule->machine->number,
                $schedule->machine->name,
                $schedule->product_name,
                $schedule->product_quantity,
                $schedule->output_std_per_shift,
                $schedule->date_start,
                $schedule->shift_start,
                $schedule->date_end,
                $schedule->shift_end,
            ];
            $sheet->fromArray([$values], NULL, 'A' . $row);
            $row++;
        }

        $filename = 'schedules.xlsx';

        // Prepare the Excel file as a binary data stream for the browser
        $writer = new Xlsx($spreadsheet);

        // Send headers
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write file to output
        $writer->save('php://output');

        // Make sure no extra content is sent
        exit;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // redirect to create view
        return view('schedules.create');
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
        $schedule = Schedule::findOrFail($id);

        // redirect to show view
        return view('schedules.show',compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // get data by id
        $schedule = Schedule::findOrFail($id);

        // redirect to edit view
        return view('schedules.edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // get data by id
        $schedule = Schedule::findOrFail($id);

        // delete data
        $schedule->delete();

        // redirect to index view
        return redirect()->route('schedules.index')->with('success','Schedule deleted successfully');
    }
}
