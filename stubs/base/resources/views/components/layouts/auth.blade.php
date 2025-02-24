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
    @fluxAppearance
</head>
<body class="font-sans antialiased flex justify-center items-center m-auto max-w-md min-h-screen bg-zinc-50 dark:bg-zinc-800">
<div class="w-full">
    {{ $slot }}
</div>
@persist('toast')
<flux:toast/>
@endpersist
<!-- Flux -->
@fluxScripts
</body>
</html>
