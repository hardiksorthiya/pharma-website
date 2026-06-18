@extends('layouts.frontend.app')

@section('title', 'Research and Development')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Research and Development"
        description="Advancing pharmaceutical science through innovation, rigorous testing, and applied research."
    />
@endsection

@section('content')
    <x-frontend.research.main />
@endsection
