@extends('layouts.frontend.app')

@section('title', 'Home')

@section('content')
    @include('components.frontend.home.hero', ['slides' => $heroSlides ?? []])
    @include('components.frontend.home.about')
    @include('components.frontend.home.number')
    @include('components.frontend.home.service')
    @include('components.frontend.home.feature')
    @include('components.frontend.home.testimonial')
    @include('components.frontend.home.blog')
@endsection
