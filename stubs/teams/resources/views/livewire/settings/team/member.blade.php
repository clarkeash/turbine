<flux:row>
    <flux:cell class="flex items-center gap-3" variant="strong">
        <flux:avatar size="xs" src="{{ $member->avatar }}"/>
        {{ $member->name }}
        @if($member->id == auth()->id())
            <flux:badge size="sm">You</flux:badge>
        @endif
    </flux:cell>

    <flux:cell class="whitespace-nowrap">{{ $member->created_at->toDayDateTimeString() }}</flux:cell>

    <flux:cell>
        <flux:badge size="sm" :color="$member->role->badgeColour()" inset="top bottom">{{ $member->role->name }}</flux:badge>
    </flux:cell>

    <flux:cell>
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

                <flux:radio.group wire:model="role" label="Role">
                    <flux:radio value="admin" label="Admin" description="Administrator users can perform any action." checked />
                    <flux:radio value="editor" label="Editor" description="Editors have the ability to read, create, and update." />
                    <flux:radio value="viewer" label="Viewer" description="Viewer users can only read." />
                </flux:radio.group>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary">Update member</flux:button>
                </div>
            </form>
        </flux:modal>
    </flux:cell>
</flux:row>