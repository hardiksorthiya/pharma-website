@extends('layouts.frontend.app')

@section('title', $category->title)

@section('breadcrumb')
    <x-frontend.page-hero
        :title="$category->title"
        :description="$category->description"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Products', 'url' => url('/products')],
            ['label' => $category->title, 'url' => null],
        ]"
    />
@endsection

@section('content')
    @if ($subCategories->isNotEmpty())
        @include('components.frontend.products.sub-categories-grid', [
            'category' => $category,
            'subCategories' => $subCategories,
        ])
    @else
        <x-frontend.products.listing
            :products="$products"
            :enquiry-products="$enquiryProducts"
            :show-category-filter="false"
            :heading="$category->title"
            :subheading="$category->description ?: 'Browse products in this category and submit an enquiry for pricing and availability.'" />
    @endif
@endsection

@if ($subCategories->isEmpty())
    @push('scripts')
        <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/products.js') }}"></script>
    @endpush
@endif
