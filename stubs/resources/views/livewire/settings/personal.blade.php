<div class="space-y-6">
    <img src="https://gravatar.com/avatar/{{ md5(auth()->user()->email) }}" alt="{{ auth()->user()->name }}"
         class="h-24 w-24 flex-none rounded-lg bg-gray-800 object-cover">
    <form wire:submit="save" class="space-y-6">
        <flux:input label="Name" type="text" placeholder="Your name" wire:model="name"/>
        <flux:input label="Email" type="email" placeholder="Your email address" wire:model="email"/>
        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>


