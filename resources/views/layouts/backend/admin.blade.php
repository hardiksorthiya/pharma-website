<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>
    @if ($settings->favicon_url)
        <link rel="icon" href="{{ $settings->favicon_url }}">
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend/style.css') }}">
    @stack('styles')
</head>
<body class="admin-body">
    <div class="admin-wrapper" id="adminWrapper">
        @include('layouts.backend.sidebar')

        <div class="admin-main">
            @include('layouts.backend.header')

            <main class="admin-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/admin.js') }}"></script>
    @stack('scripts')
</body>
</html>
