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
