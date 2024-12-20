<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        auth()->logout();

        $this->redirectRoute('login');
    }

    public function render()
    {
        return <<<'HTML'
            <flux:menu.item wire:click="logout">Logout</flux:menu.item>
        HTML;
    }
}
