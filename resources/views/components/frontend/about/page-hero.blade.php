@props(['title' => 'About Us'])

<section class="about-page-hero">
    <div class="about-page-hero-bg"
        style="background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1600&q=80');"></div>
    <div class="about-page-hero-overlay" aria-hidden="true"></div>
    <div class="container about-page-hero-container">
        <h1 class="about-page-hero-title">{{ $title }}</h1>
        <nav class="about-page-breadcrumb" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
</section>
