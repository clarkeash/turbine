<x-layouts.guest>
    <flux:header container>
        <flux:navbar>
            <flux:navbar.item href="/">Home</flux:navbar.item>
            <flux:navbar.item href="#">Features</flux:navbar.item>
            <flux:navbar.item href="#">Pricing</flux:navbar.item>
            <flux:navbar.item href="#">About</flux:navbar.item>
        </flux:navbar>
        <flux:spacer></flux:spacer>
        @auth
            <flux:navbar>
                <flux:navbar.item icon-trailing="arrow-right" href="{{ route('dashboard') }}">Dashboard</flux:navbar.item>
            </flux:navbar>
        @endauth
        @guest
        <flux:navbar>
            <flux:navbar.item href="{{ route('login') }}">Login</flux:navbar.item>
            <flux:navbar.item href="{{ route('register') }}">Register</flux:navbar.item>
        </flux:navbar>
        @endguest
    </flux:header>
    <flux:main container>
        <div class="flex items-center justify-center mt-10">
            <div class="text-center">
                <flux:heading size="xl">Welcome to Turbine</flux:heading>
                <flux:subheading>A Beginner's Toolkit for Livewire Flux Pro: Launch Your Next Big Idea.</flux:subheading>
            </div>
        </div>
    </flux:main>
</x-layouts.guest>
