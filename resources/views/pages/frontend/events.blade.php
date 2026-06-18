@extends('layouts.frontend.app')

@section('title', 'Events')

@section('breadcrumb')
    <x-frontend.page-hero title="Events" />
@endsection

@section('content')
    @include('components.frontend.events.main')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/frontend/events.js') }}"></script>
@endpush
