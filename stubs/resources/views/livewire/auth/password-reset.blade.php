<flux:card>
    <form wire:submit="update" class="space-y-6">
        <div>
            <flux:heading size="lg">Reset your password</flux:heading>
            <flux:subheading>Enter your new password</flux:subheading>
        </div>

        <div class="space-y-6">
            <flux:input wire:model="email" label="Email" type="email" placeholder="Your email address" required
                        autofocus />
            <flux:input wire:model="password" label="New Password" type="password" placeholder="Your new password"
                        required />
            <flux:input wire:model="password_confirmation" label="Confirm Password" type="password"
                        placeholder="Confirm your new password" required />
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full" type="submit">
                {{ __('Reset Password') }}
            </flux:button>

            <flux:button variant="ghost" class="w-full" href="{{ route('login') }}" wire:navigate>
                Back to login
            </flux:button>
        </div>
    </form>
</flux:card>
