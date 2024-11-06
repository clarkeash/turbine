<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

class PasswordReset extends Component
{
    #[Url]
    public string $token = '';

    #[Url]
    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function update()
    {
        $this->validate([
            'email' => ['required', 'email', 'exists:' . User::class],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new \Illuminate\Auth\Events\PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            Flux::toast('Password reset successfully.');
            $this->redirectRoute('login');
        } else {
            Flux::toast(
                heading: 'Failed to reset password.',
                text: trans($status),
                variant: 'danger'
            );
            $this->redirectRoute('password.reset', ['token' => $this->token, 'email' => $this->email]);
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.password-reset');
    }
}
