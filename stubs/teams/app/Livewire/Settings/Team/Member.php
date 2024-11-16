<?php

namespace App\Livewire\Settings\Team;

use App\Enums\Role;
use App\Models\User;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Member extends Component
{
    public User $member;

    public string $name = '';

    public string $email = '';

    public Role $role = Role::Viewer;

    public function mount()
    {
        $this->name = $this->member->name;
        $this->email = $this->member->email;
        $this->role = $this->member->role;
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', Rule::enum(Role::class)],
        ]);

        $this->member->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        $this->modal('member-edit')->close();

        Flux::toast('Member updated.');
    }

    public function edit()
    {
        $this->modal('member-edit')->show();
    }

    public function remove()
    {
        $this->modal('member-remove')->show();
    }

    public function render()
    {
        return view('livewire.settings.team.member');
    }
}
