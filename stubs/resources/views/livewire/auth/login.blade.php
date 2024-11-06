<flux:card>
    <form wire:submit='login' class="space-y-6">
        <div>
            <flux:heading size="lg">Log in to your account</flux:heading>
            <flux:subheading>Welcome back!</flux:subheading>
        </div>

        <div class="space-y-6">
            <flux:input wire:model='email' label="Email" type="email" placeholder="Your email address"/>

            <flux:field>
                <flux:label class="flex justify-between">
                    Password
                </flux:label>

                <flux:input wire:model='password' type="password" placeholder="Your password"/>
                <flux:link class="text-sm float-right mt-1" href="{{ route('password.request') }}" variant="subtle" wire:navigate>Forgot password?</flux:link>

                <flux:error name="password"/>
            </flux:field>

            <flux:checkbox wire:model="remember" label="Remember me"/>
        </div>

        <div class="space-y-2">
            <flux:button variant="primary" class="w-full" type="submit">Log in</flux:button>

            <flux:button variant="ghost" class="w-full" href="{{ route('register') }}" wire:navigate>
                Sign up for a new account
            </flux:button>
        </div>
    </form>
</flux:card>
