<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet"/>

    <!-- App -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Flux -->
    @fluxStyles
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>

    <flux:brand href="{{ route('dashboard') }}" logo="https://fluxui.dev/img/demo/logo.png"
                name="{{ config('app.name', 'Laravel') }}" class="px-2 dark:hidden"/>
    <flux:brand href="{{ route('dashboard') }}" logo="https://fluxui.dev/img/demo/dark-mode-logo.png"
                name="{{ config('app.name', 'Laravel') }}" class="px-2 hidden dark:flex"/>

    <flux:separator variant="subtle"/>

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
        <flux:navlist.item icon="cog-6-tooth" href="{{ route('settings') }}">Settings</flux:navlist.item>
    </flux:navlist>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile avatar="https://gravatar.com/avatar/{{ md5(auth()->user()->email) }}"
                      name="{{ auth()->user()->name }}"/>
        <flux:menu>
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
            <livewire:auth.logout></livewire:auth.logout>
        </flux:menu>
    </flux:dropdown>
</flux:header>

<flux:main>
    {{ $slot }}
</flux:main>

@persist('toast')
<flux:toast/>
@endpersist

@fluxScripts
</body>
</html>
