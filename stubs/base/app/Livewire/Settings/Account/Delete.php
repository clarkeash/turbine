<?php

namespace App\Livewire\Settings\Account;

use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Delete extends Component
{
    public function delete()
    {
        auth()->user()->delete();

        $this->redirectRoute('login');

        Flux::toast('Your user has been deleted.');
    }

    public function render()
    {
        return view('livewire.settings.account.delete');
    }
}
