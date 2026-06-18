@extends('layouts.frontend.app')

@section('title', $blog->meta_title ?: $blog->title)

@push('meta')
    @if ($blog->meta_description)
        <meta name="description" content="{{ $blog->meta_description }}">
    @endif
    @if ($blog->keywords)
        <meta name="keywords" content="{{ $blog->keywords }}">
    @endif
@endpush

@section('breadcrumb')
    <x-frontend.page-hero
        :title="Str::limit($blog->title, 70)"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Blog', 'url' => route('frontend.blog.index')],
            ['label' => Str::limit($blog->title, 40), 'url' => null],
        ]"
    />
@endsection

@section('content')
    @include('components.frontend.blog.detail')
@endsection
