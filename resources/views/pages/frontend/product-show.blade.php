@extends('layouts.frontend.app')

@section('title', $product->meta_title ?: $product->title)

@push('meta')
    @if ($product->meta_description)
        <meta name="description" content="{{ $product->meta_description }}">
    @endif
    @if ($product->keywords)
        <meta name="keywords" content="{{ $product->keywords }}">
    @endif
@endpush

@section('breadcrumb')
    <x-frontend.page-hero
        :title="$product->title"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Products', 'url' => url('/products')],
            ['label' => $product->title, 'url' => null],
        ]"
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
