<div>
    <flux:heading size="xl" level="1">Account Settings</flux:heading>
    <flux:subheading size="lg" class="mb-6">Update your personal information and preferences here to keep your profile
        up-to-date.
    </flux:subheading>
    <flux:separator variant="subtle"/>
    <div class="mt-4 flex">
        <div class="w-1/3">
            <flux:heading size="lg">Personal Information</flux:heading>
            <flux:subheading>Update your personal details</flux:subheading>
        </div>
        <div class="w-2/3">
            <livewire:settings.personal/>
        </div>
    </div>
    <flux:separator variant="subtle" class="my-4"/>
    <div class="flex">
        <div class="w-1/3">
            <flux:heading size="lg">Password</flux:heading>
            <flux:subheading>Update your account password</flux:subheading>
        </div>
        <div class="w-2/3">
            <livewire:settings.password/>
        </div>
    </div>
</div>
