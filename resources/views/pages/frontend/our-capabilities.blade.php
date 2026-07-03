@extends('layouts.frontend.app')

@section('title', 'Our Capabilities')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Our Capabilities"
        description="From molecule to market — complete pharmaceutical solutions under one roof."
        :backgroundImage="asset('assets/images/research.webp')"
    />
@endsection

@section('content')
    <x-frontend.capabilities.main />
@endsection
