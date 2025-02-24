<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Pending Invites</flux:heading>
        <flux:subheading>Invites that have not accepted yet</flux:subheading>
        <livewire:settings.team.invite-member :team="$team"/>
    </div>
    <div class="w-2/3">
        <div class="space-y-6">
            @if($this->members->isEmpty())
                <flux:card class="flex items-center justify-center space-x-2">
                    <flux:icon name="user-group" class="h-8 w-8 text-gray-400"/>
                    <flux:heading size="lg">No pending invites</flux:heading>
                </flux:card>
            @else
                <flux:table :paginate="$this->members">
                    <flux:table.columns>
                        <flux:table.column>Name</flux:table.column>
                        <flux:table.column>Invitation Sent</flux:table.column>
                        <flux:table.column>Role</flux:table.column>
                        <flux:table.column></flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @foreach ($this->members as $member)
                            <livewire:settings.team.invitation :member="$member" :key="$member->id"/>
                        @endforeach
                    </flux:table.rows>
                </flux:table>
            @endif
        </div>
    </div>
</div>
