@extends('layouts.backend.admin')

@section('title', 'Edit Blog Category')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Edit Blog Category</h4>
        <p class="text-muted mb-0">Update category details for {{ $category->title }}.</p>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card admin-card">
                <div class="card-body p-4">
                    <form action="{{ route('blog-categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('pages.backend.blog-categories._form', ['category' => $category])

                        <div class="d-flex flex-wrap mt-4">
                            <button type="submit" class="btn btn-auth mr-2">Update Category</button>
                            <a href="{{ route('blog-categories.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
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
