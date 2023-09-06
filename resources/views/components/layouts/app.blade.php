<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />

        <title>{{ $title ?? 'Conduit' }}</title>

        @vite(['resources/css/app.css'])
    </head>
    <body>
        <livewire:navbar />
        {{ $slot }}
        <x-footer />
    </body>
</html>
