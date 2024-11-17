<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Team Members</flux:heading>
        <flux:subheading>Update your team details</flux:subheading>
    </div>
    <div class="w-2/3">
        <div class="space-y-6">
            <flux:table :paginate="$this->members">
                <flux:columns>
                    <flux:column>Name</flux:column>
                    <flux:column>Member Since</flux:column>
                    <flux:column>Role</flux:column>
                    <flux:column></flux:column>
                </flux:columns>

                <flux:rows>
                    @foreach ($this->members as $member)
                        <livewire:settings.team.member :member="$member" :key="$member->id"/>
                    @endforeach
                </flux:rows>
            </flux:table>
        </div>
    </div>
</div>
