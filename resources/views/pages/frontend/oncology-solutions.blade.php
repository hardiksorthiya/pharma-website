@extends('layouts.frontend.app')

@section('title', 'Oncology Solutions')

@push('meta')
    <x-frontend.seo-meta
        title="Advancing Cancer Care Through Trusted Oncology Solutions"
        description="Sanskriti Pharma provides a comprehensive portfolio of oncology medicines and specialized pharmaceutical solutions to healthcare partners across global markets."
        :url="url('/oncology-solutions')"
    />
@endpush

@section('breadcrumb')
    <x-frontend.page-hero
        title="Advancing Cancer Care Through Trusted Oncology Solutions"
        description="Sanskriti Pharma provides a comprehensive portfolio of oncology medicines and specialized pharmaceutical solutions to healthcare partners across global markets."
        :backgroundImage="asset('assets/images/sans6.webp')"
    />
@endsection

@section('content')
    @include('components.frontend.oncology.main')
@endsection
