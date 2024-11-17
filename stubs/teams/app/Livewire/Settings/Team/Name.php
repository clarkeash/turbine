<?php

namespace App\Livewire\Settings\Team;

use App\Models\Team;
use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Name extends Component
{
    public Team $team;

    #[Validate('required', 'string', 'max:255')]
    public string $name = '';

    public function mount()
    {
        $this->name = $this->team->name;
    }

    public function save()
    {
        $this->validate();

        $this->team->forceFill([
            'name' => $this->name,
        ])->save();

        Flux::toast('Your team name has been updated.');
    }

    public function render()
    {
        return view('livewire.settings.team.name');
    }
}
