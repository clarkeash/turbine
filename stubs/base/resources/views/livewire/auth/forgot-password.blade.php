<flux:card>
    <form wire:submit="send" class="space-y-6">
        <div>
            <flux:heading size="lg">Reset your password</flux:heading>
            <flux:subheading>Enter your email to receive a password reset link</flux:subheading>
        </div>

        <div class="space-y-6">
            <flux:input wire:model="email" label="Email" type="email" placeholder="Your email address" required
                        autofocus />
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full" type="submit">
                {{ __('Email Password Reset Link') }}
            </flux:button>

            <flux:button variant="ghost" class="w-full" href="{{ route('login') }}" wire:navigate>
                Back to login
            </flux:button>
        </div>
    </form>
</flux:card>
