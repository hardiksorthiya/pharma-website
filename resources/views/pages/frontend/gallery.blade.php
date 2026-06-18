@extends('layouts.frontend.app')

@section('title', 'Gallery')

@section('breadcrumb')
    <x-frontend.page-hero title="Gallery" />
@endsection

@section('content')
    <x-frontend.gallery.main :galleries="$galleries" />
@endsection
