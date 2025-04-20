<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>{{ isset($title) ? $title . ' | ' . config('app.name', 'Healing Touch Hospital') : config('app.name', 'Healing Touch Hospital') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="w-full flex flex-col min-h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-0 bg-gray-100">         
            <div class="w-full bg-white shadow-md overflow-hidden rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
    </body>

</html>
