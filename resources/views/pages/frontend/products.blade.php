@extends('layouts.frontend.app')

@section('title', 'Products')

@push('meta')
    <x-frontend.seo-meta
        title="Products"
        description="Browse our pharmaceutical product categories and explore related products."
        :url="url('/products')"
    />
@endpush

@section('breadcrumb')
    <x-frontend.page-hero title="Products" />
@endsection

@section('content')
    @include('components.frontend.products.categories-grid', ['categories' => $categories])
@endsection
