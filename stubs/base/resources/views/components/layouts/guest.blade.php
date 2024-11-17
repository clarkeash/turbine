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
<body class="font-sans antialiased min-h-screen bg-zinc-50 dark:bg-zinc-800 flex flex-col justify-between">
<div class="mb-auto">
    {{ $slot }}
</div>
<footer class="h-10 bg-zinc-50 dark:bg-zinc-900 flex items-center p-4">
    <flux:link class="text-sm mr-4" href="{{ route('legal.terms') }}" wire:navigate>Terms</flux:link>
    <flux:link class="text-sm" href="{{ route('legal.privacy') }}" wire:navigate>Privacy Policy</flux:link>
</footer>
@persist('toast')
<flux:toast/>
@endpersist
<!-- Flux -->
@fluxScripts
</body>
</html>
