<div class="space-y-6">
    <form wire:submit="save" class="space-y-6">
        <flux:input label="Name" type="text" placeholder="Team name" wire:model="name"/>
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>
