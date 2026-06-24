@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'url' => null,
    'type' => 'website',
])

@if ($description)
    <meta name="description" content="{{ $description }}">
    <meta property="og:description" content="{{ $description }}">
    <meta name="twitter:description" content="{{ $description }}">
@endif

@if ($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endif

@if ($title)
    <meta property="og:title" content="{{ $title }}">
    <meta name="twitter:title" content="{{ $title }}">
@endif

@if ($image)
    <meta property="og:image" content="{{ $image }}">
    <meta name="twitter:image" content="{{ $image }}">
@endif

@if ($url)
    <meta property="og:url" content="{{ $url }}">
    <link rel="canonical" href="{{ $url }}">
@endif

<meta property="og:type" content="{{ $type }}">
<meta name="twitter:card" content="{{ $image ? 'summary_large_image' : 'summary' }}">
