<?php

namespace App\Livewire\Settings\Team;

use App\Enums\Role;
use App\Mail\TeamInvite;
use App\Models\Team;
use Flux\Flux;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InviteMember extends Component
{
    public Team $team;

    #[Validate('required', 'string', 'email', 'max:255')]
    public string $email = '';

    public Role $role = Role::Viewer;

    public function invite()
    {
        $this->validate();

        $invitation = $this->team->invitations()->create([
            'email' => $this->email,
            'role' => $this->role,
        ]);

        Flux::toast('Invitation sent.');

        Mail::to($this->email)->send(new TeamInvite($invitation));

        Flux::modal('invite-member')->close();
    }

    public function render()
    {
        return view('livewire.settings.team.invite-member');
    }
}
