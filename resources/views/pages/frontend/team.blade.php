@extends('layouts.frontend.app')

@section('title', 'Our Team')

@section('breadcrumb')
    @include('components.frontend.about.page-hero', ['title' => 'Our Team'])
@endsection

@section('content')
    @include('components.frontend.team.intro')
    @include('components.frontend.team.members')
@endsection
