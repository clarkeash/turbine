<?php

namespace App\Livewire\Settings;

use Flux\Flux;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Password extends Component
{
    public string $current = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function save()
    {
        $this->validate([
            'current' => ['required', 'string'],
            'password' =>  ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);

        if (!Hash::check($this->current, auth()->user()->password)) {
            $this->current = '';
            throw ValidationException::withMessages([
                'current' => trans('auth.failed'),
            ]);
        }

        auth()->user()->forceFill([
            'password' => Hash::make($this->password),
        ])->save();

        $this->current = '';
        $this->password = '';
        $this->password_confirmation = '';

        Flux::toast('Your password has been saved.');
    }

    public function render()
    {
        return view('livewire.settings.password');
    }
}
