<flux:table.row>
    <flux:table.cell class="flex items-center gap-3" variant="strong">
        <flux:avatar size="xs" src="{{ $member->avatar }}"/>
        {{ $member->name }}
        @if($member->id == auth()->id())
            <flux:badge size="sm">You</flux:badge>
        @endif
    </flux:table.cell>

    <flux:table.cell class="whitespace-nowrap">{{ $member->created_at->toDayDateTimeString() }}</flux:table.cell>

    <flux:table.cell>
        <flux:badge size="sm" :color="$member->role->badgeColour()" inset="top bottom">{{ $member->role->name }}</flux:badge>
    </flux:table.cell>

    <flux:table.cell>
        <flux:dropdown>
            <flux:button icon="ellipsis-horizontal" variant="ghost" inset="top bottom" size="sm"></flux:button>

            <flux:menu>
                <flux:menu.item wire:click="edit" icon="pencil-square">Edit</flux:menu.item>
                <flux:menu.item wire:click="remove" icon="trash" variant="danger">Delete</flux:menu.item>
            </flux:menu>
        </flux:dropdown>

        <flux:modal name="member-remove" class="min-w-[22rem]">
            <form class="space-y-6" wire:submit="$parent.remove({{ $member->id }})">
                <div>
                    <flux:heading size="lg">Remove member?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this member.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:subheading>
                </div>

                <div class="flex">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Remove member</flux:button>
                </div>
            </form>
        </flux:modal>

        <flux:modal name="member-edit" class="md:w-96" variant="flyout">
            <form wire:submit="update" class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit member</flux:heading>
                    <flux:subheading>Update a member in your team</flux:subheading>
                </div>

                <flux:input wire:model="name" label="Name" />

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

                    <flux:button type="submit" variant="primary">Update member</flux:button>
                </div>
            </form>
        </flux:modal>
    </flux:table.cell>
</flux:table.row>