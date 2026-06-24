@extends('layouts.frontend.app')

@section('title', 'Products')

@push('meta')
    <x-frontend.seo-meta
        title="Products"
        description="Browse our pharmaceutical products and submit an enquiry for pricing and availability."
        :url="url('/products')"
    />
@endpush

@section('breadcrumb')
    <x-frontend.page-hero title="Products" />
@endsection

@section('content')
    <x-frontend.products.listing
        :products="$products"
        :categories="$categories"
        :sub-categories="$subCategories"
        :enquiry-products="$enquiryProducts" />
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/products.js') }}"></script>
@endpush
