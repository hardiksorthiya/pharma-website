@extends('layouts.frontend.app')

@section('title', 'Research & Development')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Research & Development"
        description="Driving innovation through science and expertise to deliver high-quality pharmaceutical solutions worldwide."
        :backgroundImage="asset('assets/images/research.webp')"
    />
@endsection

@section('content')
    <x-frontend.research.main />
@endsection
