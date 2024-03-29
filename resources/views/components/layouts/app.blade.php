@props([
    'title' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ($title !== null ? $title . ' | ' : '') . config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="https://cdn.maurobaptista.com/common/favicon.png" type="image/png">

    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ config('site.author.image') }}" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="{{ config('site.social.twitter') }}" />
    <meta name="twitter:creator" content="{{ config('site.social.twitter') }}" />

    @vite('resources/css/app.css')

    @if (config('services.fathom.domain') && config('services.fathom.site'))
        <script src="https://{{ config('services.fathom.domain') }}/script.js" data-spa="auto" data-site="{{ config('services.fathom.site') }}" defer></script>
    @endif

    @isset($meta)
        {{ $meta }}
    @endif
</head>
<body class="mx-2 md:mx-0">
    <div class="my-6 text-center">
        <a class="text-3xl md:text-5xl font-title font-bold bg-gradient-to-r from-green-600 to-blue-600 text-transparent bg-clip-text" href="{{ route('homepage') }}">MauroBaptista.com</a>
    </div>
    <div class="max-w-4xl m-auto">
        {{ $slot }}
    </div>
    <x-footer />
</body>
</html>
