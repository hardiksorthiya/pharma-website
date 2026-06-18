@extends('layouts.backend.admin')

@section('title', 'Add Product Category')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Add Product Category</h4>
        <p class="text-muted mb-0">Create a new category with image, slug, title, and description.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card">
                <div class="card-body p-4">
                    <form action="{{ route('product-categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('pages.backend.categories._form')

                        <div class="d-flex flex-wrap mt-4">
                            <button type="submit" class="btn btn-auth mr-2">Save Category</button>
                            <a href="{{ route('product-categories.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/backend/category-form.js') }}"></script>
@endpush
