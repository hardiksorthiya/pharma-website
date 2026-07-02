@extends('layouts.frontend.app')

@section('title', 'About Us')

@section('breadcrumb')
    <x-frontend.page-hero
        title="About Us"
        description="Leading Indian pharmaceutical exporter and global supplier of high-quality medicines, serving healthcare markets worldwide since 2007."
        :backgroundImage="asset('assets/images/research.webp')"
    />
@endsection

@section('content')
    @include('components.frontend.about.intro')
    @include('components.frontend.about.approach')
    @include('components.frontend.about.principles')
@endsection
