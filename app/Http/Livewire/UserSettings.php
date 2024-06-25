<?php

namespace App\Http\Livewire;

use App\Models\ProductionReport;
use App\Models\Setting;
use App\Models\Verification;
use Livewire\Component;

class UserSettings extends Component
{
    public $setting;

    protected $rules = [
        'setting.final_verifier_position' => 'required',
        'setting.reject_percentage' => 'required',
    ];

    public function mount() {
        //
    }

    public function save()
    {

        $this->validate();

        $this->setting->save();
        session()->flash('message', 'Setting Saved!');
        return redirect()->route('settings.index');
    }

    public function render()
    {
        return view('livewire.user-settings');
    }
}
