<?php

namespace App\Livewire\Auth;

use App\Enums\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public string $team = '';
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        $validated = $this->validate([
            'team' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $team = Team::create(['name' => $validated['team']]);
        $user = $team->users()->create([
            ...$validated,
            'role' => Role::Admin,
        ]);

        event(new Registered($user));

        Auth::login($user);

        $this->redirectRoute('dashboard');
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
