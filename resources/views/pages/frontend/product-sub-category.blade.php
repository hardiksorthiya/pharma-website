@extends('layouts.frontend.app')

@section('title', $subCategory->title)

@section('breadcrumb')
    <x-frontend.page-hero
        :title="$subCategory->title"
        :description="$subCategory->description"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Products', 'url' => url('/products')],
            ['label' => $category->title, 'url' => route('frontend.products.category', $category)],
            ['label' => $subCategory->title, 'url' => null],
        ]"
    />
@endsection

@section('content')
    <x-frontend.products.listing
        :products="$products"
        :enquiry-products="$enquiryProducts"
        :show-category-filter="false"
        :heading="$subCategory->title"
        :subheading="$subCategory->description ?: 'Browse products in this sub category and submit an enquiry for pricing and availability.'" />
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
    <script src="{{ asset('assets/js/frontend/products.js') }}"></script>
@endpush
