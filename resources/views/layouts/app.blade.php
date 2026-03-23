<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="robots" content="noindex,nofollow" />

        <title>LAN-Tool</title>

        {{-- Scripts --}}
        @vite('resources/js/app.js')

        {{-- Styles --}}
        @vite('resources/css/app.css')

        @livewireStyles
    </head>
    <body class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
        @yield('header')
        <main class="flex-auto flex flex-col items-center justify-center px-2 sm:px-6 lg:px-8">
            @yield('content')
        </main>
        @yield('footer')

        @livewireScripts
    </body>
</html>
