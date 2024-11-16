<flux:card>
    <form wire:submit='register' class="space-y-6">
        <div>
            <flux:heading size="lg">Register a new account</flux:heading>
            <flux:subheading>Let's get started</flux:subheading>
        </div>

        <div class="space-y-6">
            <flux:input label="Company or Organization Name" type="text" placeholder="Company name" wire:model='team' />

            <flux:input label="Name" type="text" placeholder="Your name" wire:model='name' />

            <flux:input label="Email" type="email" placeholder="Your email address" wire:model='email' />

            <flux:input label="Password" type="password" placeholder="Your password" wire:model='password' />

            <flux:input label="Confirm Password" type="password" placeholder="Confirm your password"
                        wire:model='password_confirmation' />
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full" type="submit">Register</flux:button>

            <flux:button variant="ghost" class="w-full" href="{{ route('login') }}" wire:navigate>Already have an
                account?
            </flux:button>
        </div>
    </form>
</flux:card>