@extends('layouts.frontend.app')

@section('title', 'Blog')

@section('breadcrumb')
    <x-frontend.page-hero title="Blog" />
@endsection

@section('content')
    @include('components.frontend.blog.main')
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/frontend/blogs.js') }}"></script>
@endpush
