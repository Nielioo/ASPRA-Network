<?php

namespace App\Http\Livewire\Spk;

use App\Models\Spk;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $spk;
    public $spkFile;

    public $submitButtonName;

    protected $rules = [
        'spkFile' => 'nullable|mimes:pdf,xlsx,xls,csv,txt,png,gif,jpg,jpeg|max:8192',
    ];


    public function mount() {
        // Check if the spk property is set
        if (!$this->spk){
            $this->spk = new Spk();

            $this->submitButtonName = 'Create';
        } else {
            $this->submitButtonName = 'Edit';
        }
    }

    public function save()
    {
        $this->validate();

        // Handle file upload
        if ($this->spkFile) {
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
        return view('livewire.spk.form');
    }
}
