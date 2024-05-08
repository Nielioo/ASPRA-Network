<?php

namespace App\Http\Livewire\ProductionReport;

use App\Models\Oi;
use App\Models\Product;
use App\Models\ProductionReport;
use App\Models\Schedule;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $productionReport;
    public $schedule;

    public $query;
    public $schedules;
    public $selectedSchedule;

    public $submitButtonName;

    protected $rules = [
        'schedule' => 'required',
        'productionReport.type' => 'required',
        'productionReport.date' => 'required',
        'productionReport.shift' => 'required',
        'productionReport.total_approved' => 'required',
        'productionReport.total_rejected' => 'required',
        'productionReport.description' => '',
    ];

    public function mount() {
        // Check if the productionReport property is set
        if (!$this->productionReport){
            $this->productionReport = new ProductionReport(['date' => Carbon::now()->format('Y-m-d')]);
            $this->schedule = $this->productionReport->schedule_id;
            $this->schedules = Schedule::all();

            $this->submitButtonName = 'Create';
        } else {
            $this->selectedSchedule = $this->productionReport->schedule;

            $this->submitButtonName = 'Edit';
        }
    }

    public function updatedSchedule($value)
    {
        // Find the selected Schedule
        $schedule = Schedule::find($value);

        $this->selectedSchedule = $schedule;
    }

    public function updateSelectedSchedule($scheduleId)
    {
        $selectedSchedule = Schedule::find($scheduleId);

        if ($selectedSchedule) {
            $this->selectedSchedule = $selectedSchedule;
            $this->resetVars();
        }
    }

    public function updatedQuery()
    {
        sleep(0.5);
        $this->schedules = Schedule::with('oi.product')
            ->where('id', 'like', '%' . $this->query . '%')
            ->orWhereHas('oi.product', function ($query) {
                $query->where('product_code', 'like', '%' . $this->query . '%')
                    ->orWhere('name', 'like', '%' . $this->query . '%');
            })
            ->orWhere('product_name', 'like', '%' . $this->query . '%')
            ->orWhere('date_start', 'like', '%' . $this->query . '%')
            ->get()->toArray();
    }

    public function resetVars()
    {
        $this->query = '';
        $this->schedules = [];
    }

    public function sendMessage()
    {
        $client = new Client();
        $token = 'Bearer EAANKo9YdU28BO6TUMN4FlJTUmvYtRB2Ws6fhdjFlBtVTzTSO9jt5DXP54hOlCT2gEK6jXhNJoIqDWFXzkHce7rDj83sj3hk1ZCkbwZB6AUlRUZCzNV2GUpkhJmvSC6oVESgujZBYPbbrXpot4XQJxaZA9KDuy2yzSx4IjreZCZACpL12CWQNknEoZBVr5P6cL5Mb';

        $product_name = '[' . $this->productionReport->type . '] ' . '[' . $this->productionReport->product->product_code . '] ' . $this->productionReport->product->name;
        $reject_percentage = $this->productionReport->total_rejected / $this->productionReport->total_approved * 100 . '%';
        $date_and_shift = $this->productionReport->date . ' ' . $this->productionReport->shift;

        $response = $client->post('https://graph.facebook.com/v19.0/260819393788777/messages', [
            'headers' => [
                'Authorization' => $token,
                'Content-Type' => 'application/json'
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => '6285105118880',

                'type' => 'template',
                'template' => [
                    'name' => 'production_reject_notifications',
                    'language' => [
                        'code' => 'en_US'
                    ],
                    'components' => [
                        [
                            'type' =>'body',
                            'parameters' => [
                                [
                                    'type' => 'text',
                                    'text' => $product_name,
                                ],
                                [
                                    'type' => 'text',
                                    'text' => $reject_percentage,
                                ],
                                [
                                    'type' => 'text',
                                    'text' => $date_and_shift,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        return back();
    }

    public function save()
    {
        $this->schedule = $this->selectedSchedule;
        $this->validate();

        $this->productionReport->schedule_id = $this->schedule->id;
        $this->productionReport->product_id = $this->schedule->oi->product_id;

        if ($this->productionReport->exists) {
            // Subtract the old value
            $this->productionReport->product->remaining_stock -= $this->productionReport->getOriginal('total_approved');
            $this->productionReport->product->grand_total_rejected -= $this->productionReport->getOriginal('total_rejected');
        }

        // Add the new value
        $this->productionReport->product->remaining_stock += $this->productionReport->total_approved;
        $this->productionReport->product->grand_total_rejected += $this->productionReport->total_rejected;

        $this->productionReport->product->outstanding = $this->productionReport->schedule->oi->total_order - $this->productionReport->product->remaining_stock;

        if ($this->productionReport->total_rejected / $this->productionReport->total_approved * 100 >= 2.00)
        {
            $this->sendMessage();
        }

        $this->productionReport->save();
        $this->productionReport->product->save();

        session()->flash('message', 'Production Report Saved!');
        return redirect()->route('production_reports.index');
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.production-report.form', ['schedules' => $schedules]);
    }
}
