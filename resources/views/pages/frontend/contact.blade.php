@extends('layouts.frontend.app')

@section('title', 'Contact Us')

@section('breadcrumb')
    <x-frontend.page-hero title="Contact Us" />
@endsection

@section('content')
    @include('components.frontend.contact.main')
    @include('components.frontend.contact.faq')
@endsection
