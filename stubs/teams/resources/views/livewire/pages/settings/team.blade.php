<div>
    <flux:heading size="xl" level="1">Team Settings</flux:heading>
    <flux:subheading size="lg" class="mb-6">Update your team information and add or remove team members here.</flux:subheading>
    <flux:separator variant="subtle" class="mb-4"/>
    <div class="flex">
        <div class="w-1/3">
            <flux:heading size="lg">Team Name</flux:heading>
            <flux:subheading>Update your team name</flux:subheading>
        </div>
        <div class="w-2/3">
            <livewire:settings.team.name :team="$team"/>
        </div>
    </div>
    <flux:separator variant="subtle" class="my-4"/>
    <div class="flex">
        <div class="w-1/3">
            <flux:heading size="lg">Team Members</flux:heading>
            <flux:subheading>Update your team details</flux:subheading>
        </div>
        <div class="w-2/3">
            <livewire:settings.team.members :team="$team"/>
{{--    edit, delete         --}}
        </div>
    </div>
    <flux:separator variant="subtle" class="my-4"/>
    <div class="flex">
        <div class="w-1/3">
            <flux:heading size="lg">Invite a Member</flux:heading>
            <flux:subheading>Invite a new member to join your team</flux:subheading>
        </div>
        <div class="w-2/3">
{{--    name, email, role        --}}
        </div>
    </div>
    <flux:separator variant="subtle" class="my-4"/>
    <div class="flex">
        <div class="w-1/3">
            <flux:heading size="lg">Pending Invites</flux:heading>
            <flux:subheading>Invites that have not accepted yet</flux:subheading>
        </div>
        <div class="w-2/3">
{{-- table of name, email, role, age and resend invite email button --}}
        </div>
    </div>
</div>
