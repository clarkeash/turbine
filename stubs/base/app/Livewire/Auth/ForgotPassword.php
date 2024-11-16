<?php

namespace App\Livewire\Auth;

use Flux\Flux;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('email')]
    public string $email = '';

    public function send()
    {
        $this->validate();

        // Send password reset link
        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            Flux::toast('Password reset link sent to your email.');
            $this->redirectRoute('login');
        } else {
            Flux::toast(
                text: 'Failed to send password reset link.',
                variant: 'danger'
            );
            $this->reset('email');
            throw ValidationException::withMessages([
                'email' => trans($status)
            ]);
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
