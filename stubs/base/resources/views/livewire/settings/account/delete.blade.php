<div class="flex">
    <div class="w-1/3">
        <flux:heading size="lg">Delete</flux:heading>
        <flux:subheading>Delete your account</flux:subheading>
    </div>
    <div class="w-2/3">
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
    </div>
</div>


