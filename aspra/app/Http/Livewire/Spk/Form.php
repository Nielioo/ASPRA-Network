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

    public $submitButtonName;

    protected $rules = [
        'schedule' => 'required',
        'spkFile' => 'nullable|mimes:pdf,xlsx,xls,csv,txt,png,gif,jpg,jpeg|max:8192',
    ];


    public function mount() {
        // Check if the spk property is set
        if (!$this->spk){
            $this->spk = new Spk();
            $this->schedule = $this->spk->schedule_id;

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
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
