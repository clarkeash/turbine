<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Team Name</flux:heading>
        <flux:subheading>Update your team name</flux:subheading>
    </div>
    <div class="w-2/3">
        <div class="space-y-6">
            <form wire:submit="save" class="space-y-6">
                <flux:input label="Name" type="text" placeholder="Team name" wire:model="name"/>
                <flux:button variant="primary" type="submit">Save</flux:button>
            </form>
        </div>
    </div>
</div>
