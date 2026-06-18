@extends('layouts.frontend.app')

@section('title', $event->title)

@section('breadcrumb')
    <x-frontend.page-hero
        :title="Str::limit($event->title, 70)"
        :breadcrumbs="[
            ['label' => 'Home', 'url' => url('/')],
            ['label' => 'Events', 'url' => route('frontend.events.index')],
            ['label' => Str::limit($event->title, 40), 'url' => null],
        ]"
    />
@endsection

@section('content')
    @include('components.frontend.events.detail')
@endsection
