<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @php
    $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
    $js = $manifest['resources/js/app.js']['file'] ?? null;
    $css = $manifest['resources/css/app.css']['css'][0] ?? null;
@endphp

@if ($js && $css)
    <link rel="stylesheet" href="{{ asset("build/{$css}") }}">
    <script type="module" src="{{ asset("build/{$js}") }}"></script>
@endif

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <livewire:patient-booking.header />

    <body class="w-full flex flex-col min-h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-0 bg-gray-100">         
            <div class="w-full bg-white shadow-md overflow-hidden rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @livewireScripts
    </body>
    <livewire:patient-booking.footer />

</html>
