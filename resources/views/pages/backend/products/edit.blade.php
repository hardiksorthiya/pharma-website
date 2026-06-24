@extends('layouts.backend.admin')

@section('title', 'Edit Product')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Edit Product</h4>
        <p class="text-muted mb-0">Update product details for {{ $product->title }}.</p>
    </div>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card admin-card">
            <div class="card-body p-4">
                @include('pages.backend.products._form', ['product' => $product])

                <div class="d-flex flex-wrap mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-auth mr-2">Update Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
    <script src="{{ asset('assets/js/backend/single-select.js') }}"></script>
    <script src="{{ asset('assets/js/backend/product-form.js') }}"></script>
@endpush
