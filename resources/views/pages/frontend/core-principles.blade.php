@extends('layouts.frontend.app')

@section('title', 'Our Core Values')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Our Core Values"
        description="The principles that guide Sanskriti Pharma in delivering trusted pharmaceutical solutions worldwide."
    />
@endsection

@section('content')
    <x-frontend.core-principles.main />
@endsection
