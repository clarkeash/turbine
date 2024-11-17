<flux:row>
    <flux:cell class="flex items-center gap-3">
        {{ $member->email }}
    </flux:cell>

    <flux:cell>
        <flux:badge size="sm" inset="top bottom">{{ $member->created_at->diffForHumans() }}</flux:badge>
    </flux:cell>

    <flux:cell>
        <flux:badge size="sm" :color="$member->role->badgeColour()" inset="top bottom">{{ $member->role->name }}</flux:badge>
    </flux:cell>

    <flux:cell>
        <flux:button wire:click="remove" icon="trash" variant="ghost" inset="top bottom" size="sm"></flux:button>
        <flux:modal name="invitation-remove" class="min-w-[22rem]">
            <form class="space-y-6" wire:submit="$parent.remove({{ $member->id }})">
                <div>
                    <flux:heading size="lg">Revoke invitation?</flux:heading>

                    <flux:subheading>
                        <p>You're about to revoke this invitation.</p>
                    </flux:subheading>
                </div>

                <div class="flex">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger">Revoke invitation</flux:button>
                </div>
            </form>
        </flux:modal>
    </flux:cell>
</flux:row>