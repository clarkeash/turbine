<?php

namespace App\Livewire\Auth;

use App\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    public function login()
    {
        $this->validate();

        if (Auth::attempt($this->only(['email', 'password']), $this->remember)) {
            $this->redirect(Dashboard::class);
        } else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
