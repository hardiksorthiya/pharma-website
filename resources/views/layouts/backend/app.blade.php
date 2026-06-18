<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sanskruti Pharma') }}</title>
        @if (isset($settings) && $settings->favicon_url)
            <link rel="icon" href="{{ $settings->favicon_url }}">
        @endif

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/backend/style.css') }}">

    </head>
    <body class="font-sans antialiased">
        @yield('content')

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>
