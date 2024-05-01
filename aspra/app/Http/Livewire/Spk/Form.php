<?php

namespace App\Http\Livewire\Spk;

use App\Models\Oi;
use App\Models\Schedule;
use App\Models\Spk;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $spk;
    public $spkFile;
    public $schedule;

    public $query;
    public $schedules;
    public $selectedSchedule;

    public $submitButtonName;

    protected $rules = [
        'schedule' => 'required',
        'spkFile' => 'nullable|mimes:pdf,xlsx,xls,csv,txt,png,gif,jpg,jpeg|max:24576',
    ];


    public function mount() {
        // Check if the spk property is set
        if (!$this->spk){
            $this->spk = new Spk();

            $this->submitButtonName = 'Create';
        } else {
            $this->selectedSchedule = $this->spk->schedule;

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
        $this->schedules = Schedule::where('id', 'like', '%' . $this->query . '%')
            ->orWhere('product_name', 'like', '%' . $this->query . '%')
            ->orWhere('date_start', 'like', '%' . $this->query . '%')
            ->get()->toArray();
    }

    public function resetVars()
    {
        $this->query = '';
        $this->schedules = [];
    }

    public function save()
    {
        $this->schedule = $this->selectedSchedule->id;
        $this->validate();

        $this->spk->schedule_id = $this->schedule;

        // Handle file upload
        if ($this->spkFile) {

            // If a file already exists for this SPK, delete it
            if ($this->spk->file_path) {
                // Get the file path relative to the storage disk
                $oldFilePath = str_replace('storage/', '', $this->spk->file_path);

                // Delete the old file
                Storage::disk('public')->delete($oldFilePath);
            }

            // Generate a unique filename with microtime
            $filename = 'spk' . microtime(true) . '.' . $this->spkFile->getClientOriginalExtension();

            // Save the file to the storage directory
            $this->spkFile->storeAs('files/spk', $filename, 'public');

            // Update the file_path attribute with the new filename
            $this->spk->file_path = 'storage/files/spk/'.$filename;
            $this->spkFile = null;
        }

        $this->spk->save();
        session()->flash('message', 'SPK Saved!');
        return redirect()->route('spks.index');
    }

    public function render()
    {
        $schedules = Schedule::all();
        return view('livewire.spk.form', ['schedules' => $schedules]);
    }
}
