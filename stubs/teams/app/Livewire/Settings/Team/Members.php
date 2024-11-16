<?php

namespace App\Livewire\Settings\Team;

use App\Models\Team;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Members extends Component
{
    use WithPagination, WithoutUrlPagination;

    public Team $team;

    #[\Livewire\Attributes\Computed]
    public function members()
    {
        return $this->team->members()->paginate(5);
    }

    public function remove(int $userId)
    {
        $this->team->members()->findOrFail($userId)->delete();

        Flux::modal('remove-member')->close();

        Flux::toast('Member removed.');
    }

    public function render()
    {
        return view('livewire.settings.team.members');
    }
}
