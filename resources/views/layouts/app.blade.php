<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="robots" content="noindex" />

        <title>LAN-Tool</title>

        {{-- Scripts --}}
        <script src="{{ mix('js/app.js') }}" defer></script>

        {{-- Styles --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="flex flex-col min-h-screen bg-gray-100">
        @yield('header')
        <main class="flex-auto flex flex-col items-center justify-center">
            @yield('content')
        </main>
        @yield('footer')

        @livewireScripts
    </body>
</html>