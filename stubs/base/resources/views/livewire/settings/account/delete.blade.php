<div class="space-y-6">
    <flux:modal.trigger name="delete-profile">
        <flux:button variant="danger">Delete</flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-profile" class="min-w-[22rem] space-y-6">
        <div>
            <flux:heading size="lg">Delete Account?</flux:heading>

            <flux:subheading>
                <p>You're about to delete your account.</p>
                <p>This action cannot be reversed.</p>
            </flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>

            <form wire:submit="delete">
                <flux:button type="submit" variant="danger">Delete Account</flux:button>
            </form>
        </div>
    </flux:modal>
</div>


