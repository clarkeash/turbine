<?php

namespace App\Livewire\Settings;

use Flux\Flux;
use Livewire\Component;

class Personal extends Component
{
    public string $name = '';
    public string $email = '';

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        auth()->user()->forceFill([
            'name' => $this->name,
            'email' => $this->email,
        ])->save();

        Flux::toast('Your changes have been saved.');
    }

    public function render()
    {
        return view('livewire.settings.personal');
    }
}
