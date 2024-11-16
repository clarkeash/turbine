<?php

namespace App\Livewire\Pages\Settings;

use Livewire\Component;

class Team extends Component
{
    public \App\Models\Team $team;

    public function mount()
    {
        $this->team = auth()->user()->team;
    }

    public function render()
    {
        return view('livewire.pages.settings.team');
    }
}
