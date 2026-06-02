<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @fluxAppearance
    </head>
    <body class="min-h-screen flex flex-col antialiased max-w-4xl mx-auto px-4 pt-4 xl:px-0">
        <main class="flex-1">
            {{ $slot }}
        </main>

        @livewireScripts
        @fluxScripts

        {{-- Footer Separator --}}
        <flux:separator variant="subtle" class="mt-7" />

        <footer class="flex justify-center py-6">
            <flux:text>&copy; {{ date('Y') }} JL Pile. All rights reserved.</flux:text>
        </footer>
    </body>
</html>
