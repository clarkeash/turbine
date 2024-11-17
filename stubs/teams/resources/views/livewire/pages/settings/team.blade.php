<div>
    <flux:heading size="xl" level="1">Team Settings</flux:heading>
    <flux:subheading size="lg" class="mb-2">Update your team information and add or remove team members here.</flux:subheading>
    <flux:separator variant="subtle" class="my-4"/>
    <livewire:settings.team.name :team="$team"/>
    <flux:separator variant="subtle" class="my-4"/>
    <livewire:settings.team.members :team="$team"/>
    <flux:separator variant="subtle" class="my-4"/>
    <livewire:settings.team.invitations :team="$team"/>
</div>
