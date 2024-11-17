<?php

namespace App\Livewire\Auth;

use App\Enums\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Invitation extends Component
{
    public \App\Models\Invitation $invitation;

    public string $name = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        if (User::where('email', $this->invitation->email)->exists()) {
            $this->addError('email', 'User already exists with this email.');
            return;
        }

        $validated['password'] = Hash::make($validated['password']);

        $user = $this->invitation->team->members()->create([
            ...$validated,
            'email' => $this->invitation->email,
            'role' => $this->invitation->role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        \App\Models\Invitation::forEmail($this->invitation->email)->delete();

        $this->redirectRoute('dashboard');
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.invitation');
    }
}