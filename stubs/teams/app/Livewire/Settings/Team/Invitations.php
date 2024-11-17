<?php

namespace App\Livewire\Settings\Team;

use App\Models\Team;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Invitations extends Component
{
    use WithPagination, WithoutUrlPagination;

    public Team $team;

    #[\Livewire\Attributes\Computed]
    public function members()
    {
        return $this->team->invitations()
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    public function remove(int $id)
    {
        $this->team->invitations()->findOrFail($id)->delete();

        Flux::modal('remove-invitation')->close();

        Flux::toast('Invitation revoked.');
    }

    public function render()
    {
        return view('livewire.settings.team.invitations');
    }
}
