<flux:card>
    <form wire:submit='register' class="space-y-6">
        <div>
            <flux:heading size="lg">Create your account</flux:heading>
            <flux:subheading>Join everyone at {{ $this->invitation->team->name }}</flux:subheading>
        </div>

        <div class="space-y-6">
            <flux:input label="Name" type="text" placeholder="Your name" wire:model='name' />

            <flux:input label="Email" type="email" :value="$this->invitation->email" disabled/>

            <flux:input label="Password" type="password" placeholder="Your password" wire:model='password' />

            <flux:input label="Confirm Password" type="password" placeholder="Confirm your password"
                        wire:model='password_confirmation' />
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full" type="submit">Join</flux:button>
        </div>
    </form>
</flux:card>
