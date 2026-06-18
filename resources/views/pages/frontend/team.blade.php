@extends('layouts.frontend.app')

@section('title', 'Our Team')

@section('breadcrumb')
    <x-frontend.page-hero title="Our Team" />
@endsection

@section('content')
    @include('components.frontend.team.intro')
    @include('components.frontend.team.members')
@endsection
