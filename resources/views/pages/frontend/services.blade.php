@extends('layouts.frontend.app')

@section('title', 'Services')

@section('breadcrumb')
    <x-frontend.page-hero title="Services" />
@endsection

@section('content')
    @include('components.frontend.services.main')
@endsection
