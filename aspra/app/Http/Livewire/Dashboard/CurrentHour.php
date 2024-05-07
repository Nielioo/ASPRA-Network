<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class CurrentHour extends Component
{
    public $currentHour;

    public function mount()
    {
        $this->currentHour = $this->getCurrentHour();
    }

    protected function getListeners()
    {
        return [
            'echo:clock,HourChanged' => 'updateCurrentHour',
        ];
    }

    public function updateCurrentHour()
    {
        $this->currentHour = $this->getCurrentHour();
    }

    private function getCurrentHour()
    {
        $currentHour = now()->format('H');
        $nextHour = now()->addHour()->format('H');

        return "{$currentHour}:00:00 - {$nextHour}:00:00";
    }

    public function render()
    {
        return view('livewire.dashboard.current-hour');
    }
}
