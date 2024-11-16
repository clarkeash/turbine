<form wire:submit="save" class="space-y-6">
    <flux:input label="Current Password" type="password" placeholder="Your current password" wire:model="current"/>
    <flux:input label="New Password" type="password" placeholder="Your new password" wire:model="password"/>
    <flux:input label="Confirm Password" type="password" placeholder="Confirm your new password" wire:model="password_confirmation"/>
    <flux:button variant="primary" type="submit">Save</flux:button>
</form>
