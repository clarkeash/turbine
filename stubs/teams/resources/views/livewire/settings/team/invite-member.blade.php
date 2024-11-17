<div class="mt-4">
    <flux:modal.trigger name="invite-member">
        <flux:button icon="user-plus">Invite a new member</flux:button>
    </flux:modal.trigger>

    <flux:modal name="invite-member" class="md:w-96 space-y-6">
        <div>
            <flux:heading size="lg">Invite Member</flux:heading>
            <flux:subheading>Invite a new member of your team.</flux:subheading>
        </div>

        <form wire:submit="invite" class="space-y-6">
            <flux:input type="email" wire:model="email" label="Email" />

            <flux:radio.group label="Role" wire:model="role">
                @foreach(\App\Enums\Role::cases() as $role)
                    <flux:radio
                            name="role"
                            value="{{ $role->value }}"
                            label="{{ $role->name }}"
                            description="{{ $role->description() }}"
                    />
                @endforeach
            </flux:radio.group>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary">Invite</flux:button>
            </div>
        </form>
    </flux:modal>
</div>