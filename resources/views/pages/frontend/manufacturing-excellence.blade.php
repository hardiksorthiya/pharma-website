@extends('layouts.frontend.app')

@section('title', 'Manufacturing Excellence')

@section('breadcrumb')
    <x-frontend.page-hero
        title="Manufacturing Excellence"
        description="Precision manufacturing and global quality standards at the heart of every Sanskriti Pharma product."
        :backgroundImage="asset('assets/images/research.webp')"
    />
@endsection

@section('content')
    <x-frontend.manufacturing.main />
@endsection
