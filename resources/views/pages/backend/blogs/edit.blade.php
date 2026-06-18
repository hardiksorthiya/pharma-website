@extends('layouts.backend.admin')

@section('title', 'Edit Blog')

@section('content')
    <div class="page-header mb-4">
        <h4 class="mb-1 font-weight-bold">Edit Blog</h4>
        <p class="text-muted mb-0">Update blog post for {{ $blog->title }}.</p>
    </div>

    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card admin-card">
            <div class="card-body p-4">
                @include('pages.backend.blogs._form', ['blog' => $blog])

                <div class="d-flex flex-wrap mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-auth mr-2">Update Blog</button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-auth-outline btn-outline-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('assets/js/checkbox-multiselect.js') }}"></script>
    <script src="{{ asset('assets/js/backend/blog-form.js') }}"></script>
@endpush
