@extends('layouts.frontend.app')

@section('title', $category->title)

@section('breadcrumb')
    <x-frontend.page-hero
        :title="$category->title"
        :description="$category->description"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Products', 'url' => url('/products')],
            ['label' => $category->title, 'url' => null],
        ]"
    />
@endsection

@section('content')
    @include('components.frontend.products.sub-categories-grid', [
        'category' => $category,
        'subCategories' => $subCategories,
    ])
@endsection
