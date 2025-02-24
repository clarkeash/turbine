<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Team Members</flux:heading>
        <flux:subheading>Update your team details</flux:subheading>
    </div>
    <div class="w-2/3">
        <div class="space-y-6">
            <flux:table :paginate="$this->members">
                <flux:table.columns>
                    <flux:table.column>Name</flux:table.column>
                    <flux:table.column>Member Since</flux:table.column>
                    <flux:table.column>Role</flux:table.column>
                    <flux:table.column></flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach ($this->members as $member)
                        <livewire:settings.team.member :member="$member" :key="$member->id"/>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        </div>
    </div>
</div>
