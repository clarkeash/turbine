<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Password</flux:heading>
        <flux:subheading>Update your account password</flux:subheading>
    </div>
    <div class="w-2/3">
        <form wire:submit="save" class="space-y-6">
            <flux:input label="Current Password" type="password" placeholder="Your current password" wire:model="current"/>
            <flux:input label="New Password" type="password" placeholder="Your new password" wire:model="password"/>
            <flux:input label="Confirm Password" type="password" placeholder="Confirm your new password" wire:model="password_confirmation"/>
            <flux:button variant="primary" type="submit">Save</flux:button>
        </form>
    </div>
</div>
