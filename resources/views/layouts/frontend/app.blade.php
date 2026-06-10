<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Sanskruti Pharma'))</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend/style.css') }}">
    @stack('styles')
</head>
<body>
    <div class="custom-cursor" id="customCursor"></div>

    {{-- @include('layouts.frontend.topbar') --}}
    @include('layouts.frontend.header')

    @hasSection('breadcrumb')
        @yield('breadcrumb')
    @endif

    @yield('content')

    @include('layouts.frontend.footer')

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/main.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/numbers-counter.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/cursor.js') }}"></script>
    @stack('scripts')
</body>
</html>
