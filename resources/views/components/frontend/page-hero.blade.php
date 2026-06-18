@props([
    'title' => '',
    'description' => null,
    'breadcrumbs' => null,
    'backgroundImage' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1600&q=80',
])

@php
    $breadcrumbs = $breadcrumbs ?? [
        ['label' => 'Home', 'url' => url('/')],
        ['label' => $title, 'url' => null],
    ];
@endphp

<section class="about-page-hero">
    <div class="about-page-hero-bg" style="background-image: url('{{ $backgroundImage }}');"></div>
    <div class="about-page-hero-overlay" aria-hidden="true"></div>
    <div class="container about-page-hero-container">
        <h1 class="about-page-hero-title">{{ $title }}</h1>
        @if ($description)
            <p class="about-page-hero-desc">{{ $description }}</p>
        @endif
        <nav class="about-page-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $crumb)
                    @if (! empty($crumb['url']))
                        <li class="breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                    @else
                        <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</section>
