@extends('layouts.frontend.app')

@section('title', 'Product Categories')

@section('breadcrumb')
    <x-frontend.page-hero title="Product Categories" />
@endsection

@section('content')
    @include('components.frontend.categories.main')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
@endpush
