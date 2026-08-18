@extends('layouts.frontend.app')

@section('title', 'Products')

@push('meta')
    <x-frontend.seo-meta
        title="Comprehensive Pharmaceutical & Healthcare Solutions"
        description="Explore Sanskriti Pharma's portfolio of pharmaceutical formulations, specialty medicines, contrast media, intermediates, and medical devices for global healthcare markets."
        :url="url('/products')"
    />
@endpush

@section('breadcrumb')
    <x-frontend.page-hero
        title="Comprehensive Pharmaceutical & Healthcare Solutions"
        description="Sanskriti Pharma offers a diverse portfolio of pharmaceutical formulations, specialty medicines, contrast media, pharmaceutical intermediates, and medical devices to meet the evolving needs of healthcare markets worldwide."
        :backgroundImage="asset('assets/images/sans4.webp')"
    />
@endsection

@section('content')
    @include('components.frontend.products.categories-grid', ['categories' => $categories])
@endsection
