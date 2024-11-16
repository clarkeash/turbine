<flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

    <flux:brand href="{{ route('dashboard') }}" logo="https://fluxui.dev/img/demo/logo.png"
                name="{{ config('app.name', 'Laravel') }}" class="px-2 dark:hidden"/>
    <flux:brand href="{{ route('dashboard') }}" logo="https://fluxui.dev/img/demo/dark-mode-logo.png"
                name="{{ config('app.name', 'Laravel') }}" class="px-2 hidden dark:flex"/>

    <flux:navlist variant="outline">
        <flux:navlist.item icon="home" href="{{ route('dashboard') }}">Home</flux:navlist.item>
        <flux:navlist.item icon="inbox" badge="12" href="#">Inbox</flux:navlist.item>
        <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item>
        <flux:navlist.item icon="calendar" href="#">Calendar</flux:navlist.item>

        <flux:navlist.group expandable heading="Favorites" class="hidden lg:grid">
            <flux:navlist.item href="#">Marketing site</flux:navlist.item>
            <flux:navlist.item href="#">Android app</flux:navlist.item>
            <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    <flux:spacer/>

    <flux:navlist variant="outline">
        <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
    </flux:navlist>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile avatar="https://gravatar.com/avatar/{{ md5(auth()->user()->email) }}"
                      name="{{ auth()->user()->name }}"/>

        <flux:menu>
            <flux:menu.group heading="Settings">
                <flux:menu.item href="{{ route('settings.account') }}">Account</flux:menu.item>
                <flux:menu.item href="{{ route('settings.team') }}">Team</flux:menu.item>
            </flux:menu.group>

            <flux:menu.group heading="Updates">
                <flux:menu.item>Changelog</flux:menu.item>
                <flux:menu.item>Roadmap</flux:menu.item>
                <flux:menu.item>Feedback</flux:menu.item>
            </flux:menu.group>

            <flux:menu.group heading="Support">
                <flux:menu.item>Docs</flux:menu.item>
                <flux:menu.item>Open a Ticket</flux:menu.item>
            </flux:menu.group>

            <livewire:auth.logout></livewire:auth.logout>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>

<flux:header class="lg:hidden">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>

    <flux:spacer/>

    <flux:dropdown position="top" alignt="start">
        <flux:profile avatar="https://gravatar.com/avatar/{{ md5(auth()->user()->email) }}"/>
        <flux:menu>
            <flux:menu.group heading="Settings">
                <flux:menu.item href="{{ route('settings.account') }}">Account</flux:menu.item>
                <flux:menu.item href="{{ route('settings.team') }}">Team</flux:menu.item>
            </flux:menu.group>

            <flux:menu.group heading="Updates">
                <flux:menu.item>Changelog</flux:menu.item>
                <flux:menu.item>Roadmap</flux:menu.item>
                <flux:menu.item>Feedback</flux:menu.item>
            </flux:menu.group>

            <flux:menu.group heading="Support">
                <flux:menu.item>Docs</flux:menu.item>
                <flux:menu.item>Open a Ticket</flux:menu.item>
            </flux:menu.group>

            <livewire:auth.logout></livewire:auth.logout>
        </flux:menu>
    </flux:dropdown>
</flux:header>