@extends('layouts.frontend.app')

@section('title', 'Global Presence')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Global Presence"
        description="Trusted pharmaceutical exporter serving global healthcare markets — Care Beyond Borders."
        :backgroundImage="asset('assets/images/research.webp')"
    />
@endsection

@section('content')
    <x-frontend.global.main />
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap/dist/css/jsvectormap.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap/dist/maps/world.js"></script>
    <script src="{{ asset('assets/js/frontend/global-map.js') }}"></script>
@endpush
