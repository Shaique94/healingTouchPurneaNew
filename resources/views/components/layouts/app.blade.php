<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        <meta name="google-site-verification" content="QXRgGxyjxtTmEweMrg2Bmi7dVx6tpwpjfSUDH4CyyW8" />
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
