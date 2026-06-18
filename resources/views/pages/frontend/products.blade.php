@extends('layouts.frontend.app')

@section('title', 'Products')

@section('breadcrumb')
    <x-frontend.page-hero title="Products" />
@endsection

@section('content')
    @include('components.frontend.products.main')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/products.js') }}"></script>
@endpush
