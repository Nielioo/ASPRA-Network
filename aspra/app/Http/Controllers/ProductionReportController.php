<?php

namespace App\Http\Controllers;

use App\Models\ProductionReport;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productionReports = ProductionReport::latest()->paginate(10);
        return view('production_reports.index',compact('productionReports'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function recap(string $type)
    {
        session(['type' => $type]);

        $productionReports = ProductionReport::where('type', $type)->latest()->paginate(10);
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

    public function exportToExcel($type)
    {
        // Turn off output buffering
        ob_end_clean();

        $productionReports = ProductionReport::where('type', $type)->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'Mesin');
        $sheet->mergeCells('A1:A3');

        $sheet->setCellValue('B1', 'Nama Produk');
        $sheet->mergeCells('B1:B3');

        $sheet->setCellValue('C1', 'Output STD / Shift');
        $sheet->mergeCells('C1:C3');

        $sheet->setCellValue('D1', 'Hasil Produksi');
        $sheet->mergeCells('D1:M1');

        $sheet->setCellValue('N1', 'Reject');
        $sheet->mergeCells('N1:R1');

        $sheet->setCellValue('S1', 'Order (OI)');
        $sheet->mergeCells('S1:S3');

        $sheet->setCellValue('T1', 'Grand Total Produksi');
        $sheet->mergeCells('T1:T3');

        $sheet->setCellValue('U1', 'Grand Total Reject');
        $sheet->mergeCells('U1:U3');

        $sheet->setCellValue('V1', 'Outstanding (Sisa OI)');
        $sheet->mergeCells('V1:V3');

        $sheet->setCellValue('W1', 'Keterangan');
        $sheet->mergeCells('W1:Y2');

        $sheet->setCellValue('D2', 'Shift 1');
        $sheet->mergeCells('D2:D3');

        $sheet->setCellValue('E2', 'Pencapaian');
        $sheet->mergeCells('E2:F2');

        $sheet->setCellValue('E3', '%');
        $sheet->setCellValue('F3', 'Grade');

        $sheet->setCellValue('G2', 'Shift 2');
        $sheet->mergeCells('G2:G3');

        $sheet->setCellValue('H2', 'Pencapaian');
        $sheet->mergeCells('H2:I2');

        $sheet->setCellValue('H3', '%');
        $sheet->setCellValue('I3', 'Grade');

        $sheet->setCellValue('J2', 'Shift 3');
        $sheet->mergeCells('J2:J3');

        $sheet->setCellValue('K2', 'Pencapaian');
        $sheet->mergeCells('K2:L2');

        $sheet->setCellValue('K3', '%');
        $sheet->setCellValue('L3', 'Grade');

        $sheet->setCellValue('M2', 'TOTAL');
        $sheet->mergeCells('M2:M3');

        $sheet->setCellValue('N2', 'Shift 1');
        $sheet->mergeCells('N2:N3');

        $sheet->setCellValue('O2', 'Shift 2');
        $sheet->mergeCells('O2:O3');

        $sheet->setCellValue('P2', 'Shift 3');
        $sheet->mergeCells('P2:P3');

        $sheet->setCellValue('Q2', 'TOTAL');
        $sheet->mergeCells('Q2:Q3');

        $sheet->setCellValue('R2', '%Reject');
        $sheet->mergeCells('R2:R3');

        $sheet->setCellValue('W3', 'Shift 1');
        $sheet->setCellValue('X3', 'Shift 2');
        $sheet->setCellValue('Y3', 'Shift 3');

        $row = 4;
        foreach ($productionReports->groupby('schedule_id') as $schedule_id => $reports) {
            $firstReport = optional($reports->first());
            $values = [
                $firstReport->schedule->machine->name,
                $firstReport->product->name,
                $firstReport->schedule->output_std_per_shift,
            ];

            $grandTotalApproved = 0;
            $grandTotalRejected = 0;
            $totalRejectedPerShift = [];
            $descriptions = [];

            foreach (['Shift 1', 'Shift 2', 'Shift 3'] as $shift) {
                $currentReport = optional($reports->firstWhere('shift', $shift));
                $totalApproved = $currentReport->total_approved ?? '-';
                $totalRejected = $currentReport->total_rejected ?? '-';
                $description = $currentReport->description ?? '-';

                $percentage = $currentReport->shift ? ($totalApproved / $firstReport->schedule->output_std_per_shift) * 100 : '-';
                $result = '-';
                if ($currentReport->shift) {
                    if ($percentage >= 95) {
                        $result = 'A';
                    } elseif ($percentage >= 86) {
                        $result = 'B';
                    } else {
                        $result = 'C';
                    }
                }

                array_push($values, $totalApproved, $percentage, $result);
                $grandTotalApproved += intval($totalApproved);
                $grandTotalRejected += intval($totalRejected);
                array_push($totalRejectedPerShift, $totalRejected);
                array_push($descriptions, $description);
            }

            $percentageRejected = rtrim(number_format(($grandTotalRejected / $grandTotalApproved) * 100, 3), '0');
            $totalOrder = $firstReport->schedule->oi->total_order;
            $remainingStock = $firstReport->product->remaining_stock;
            $grandTotalRejectedProduct = $firstReport->product->grand_total_rejected;
            $outstanding = $firstReport->product->outstanding;

            $values = array_merge($values, [$grandTotalApproved], $totalRejectedPerShift, [$grandTotalRejected, $percentageRejected, $totalOrder, $remainingStock, $grandTotalRejectedProduct, $outstanding], $descriptions);
            $sheet->fromArray([$values], NULL, 'A' . $row);
            $row++;
        }

        // Define the border style
        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];

        // Apply the border style to a range of cells
        $highestRow = $sheet->getHighestRow(); // e.g. 10
        $highestColumn = $sheet->getHighestColumn(); // e.g 'F'
        $sheet->getStyle('A1:' . $highestColumn . $highestRow)->applyFromArray($borderStyle);

        $date = date('Ymd');
        $microtime = round(microtime(true) * 1000);
        $filename = "Production_Report_Recap_" . $date . "_" . $microtime . ".xlsx";

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
}
