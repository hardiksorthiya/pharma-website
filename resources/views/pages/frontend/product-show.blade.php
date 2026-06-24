@extends('layouts.frontend.app')

@section('title', $product->meta_title ?: $product->title)

@push('meta')
    <x-frontend.seo-meta
        :title="$product->meta_title ?: $product->title"
        :description="$product->meta_description"
        :keywords="$product->keywords"
        :image="$product->feature_image_url"
        :url="url('/products/'.$product->slug)"
        type="product"
    />
@endpush

@section('breadcrumb')
    @php
        $productBreadcrumbs = [
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Products', 'url' => url('/products')],
        ];

        if ($product->category) {
            $productBreadcrumbs[] = [
                'label' => $product->category->title,
                'url' => route('frontend.products.category', $product->category),
            ];
        }

        if ($product->category && $product->subCategory) {
            $productBreadcrumbs[] = [
                'label' => $product->subCategory->title,
                'url' => route('frontend.products.sub-category', [$product->category, $product->subCategory]),
            ];
        }

        $productBreadcrumbs[] = ['label' => $product->title, 'url' => null];
    @endphp

    <x-frontend.page-hero
        :title="$product->title"
        :breadcrumbs="$productBreadcrumbs"
    />
@endsection

@section('content')
    @include('components.frontend.products.detail')
@endsection

@push('scripts')
    <script>
        $('#productEnquiryModal').on('shown.bs.modal', function () {
            $('#modalEnquiryQuantity').trigger('focus');
        });
    </script>
@endpush
