@extends('layouts.frontend.app')

@section('title', 'About Us')

@section('breadcrumb')
    @include('components.frontend.about.page-hero', ['title' => 'About Us'])
@endsection

@section('content')
    @include('components.frontend.about.intro')
    @include('components.frontend.about.approach')
    @include('components.frontend.about.principles')
@endsection
