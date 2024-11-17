<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Personal Information</flux:heading>
        <flux:subheading>Update your personal details</flux:subheading>
    </div>
    <div class="w-2/3">
        <div class="space-y-6">
            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}"
                 class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover">
            <form wire:submit="save" class="space-y-6">
                <flux:input label="Name" type="text" placeholder="Your name" wire:model="name"/>
                <flux:input label="Email" type="email" placeholder="Your email address" wire:model="email"/>
                <flux:button variant="primary" type="submit">Save</flux:button>
            </form>
        </div>
    </div>
</div>




