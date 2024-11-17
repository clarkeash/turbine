<?php

namespace App\Livewire\Settings\Team;

use App\Enums\Role;
use App\Models\User;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Invitation extends Component
{
    public \App\Models\Invitation $member;

    public string $email = '';

    public Role $role = Role::Viewer;

    public function mount()
    {
        $this->email = $this->member->email;
        $this->role = $this->member->role;
    }

    public function remove()
    {
        $this->modal('invitation-remove')->show();
    }

    public function render()
    {
        return view('livewire.settings.team.invitation');
    }
}
