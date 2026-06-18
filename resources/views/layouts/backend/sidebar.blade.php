@php
    $productsMenuActive = request()->routeIs(
        'products.*',
        'product-categories.*',
        'dosage-types.*',
        'packings.*',
        'therapeutic-classes.*',
        'specifications.*'
    );

    $productMenuItems = [
        ['label' => 'All Products', 'route' => 'products.index', 'active' => request()->routeIs('products.*')],
        ['label' => 'Product Categories', 'route' => 'product-categories.index', 'active' => request()->routeIs('product-categories.*')],
        ['label' => 'Dosage Types', 'route' => 'dosage-types.index', 'active' => request()->routeIs('dosage-types.*')],
        ['label' => 'Packings', 'route' => 'packings.index', 'active' => request()->routeIs('packings.*')],
        ['label' => 'Therapeutic Classes', 'route' => 'therapeutic-classes.index', 'active' => request()->routeIs('therapeutic-classes.*')],
        ['label' => 'Specifications', 'route' => 'specifications.index', 'active' => request()->routeIs('specifications.*')],
    ];
    $blogMenuItems = [
        ['label' => 'All Blogs', 'route' => 'blogs.index', 'active' => request()->routeIs('blogs.*')],
        ['label' => 'Blog Categories', 'route' => 'blog-categories.index', 'active' => request()->routeIs('blog-categories.*')],
    ];

    $blogMenuActive = request()->routeIs('blogs.*', 'blog-categories.*');
@endphp

<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-logo">
        @if ($settings->logo_url)
            <a href="{{ route('dashboard') }}" class="sidebar-logo-link">
                <img src="{{ $settings->logo_url }}" alt="{{ config('app.name', 'Sanskruti Pharma') }}" class="sidebar-logo-img">
            </a>
        @else
            <div class="sidebar-logo-icon">S</div>
            <span class="sidebar-logo-text">{{ config('app.name', 'Sanskruti Pharma') }}</span>
        @endif
    </div>

    <nav class="sidebar-menu">
        <a href="{{ route('dashboard') }}"
            class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146z"/>
                </svg>
            </span>
            <span class="sidebar-text">Dashboard</span>
        </a>

        <a href="{{ route('sliders.index') }}"
            class="sidebar-link {{ request()->routeIs('sliders.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                    <path d="M2 9a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V9z"/>
                </svg>
            </span>
            <span class="sidebar-text">Homepage Sliders</span>
        </a>

        <div class="sidebar-group {{ $productsMenuActive ? 'is-open' : '' }}" data-sidebar-group>
            <button type="button"
                class="sidebar-link sidebar-group-toggle {{ $productsMenuActive ? 'active' : '' }}"
                aria-expanded="{{ $productsMenuActive ? 'true' : 'false' }}">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5v4h-5V3.5A2.5 2.5 0 0 1 8 1zm0 1a1.5 1.5 0 0 0-1.5 1.5V7h3V3.5A1.5 1.5 0 0 0 8 2zM3 5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
                    </svg>
                </span>
                <span class="sidebar-text">Products</span>
                <span class="sidebar-group-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
            </button>

            <div class="sidebar-submenu">
                @foreach ($productMenuItems as $item)
                    <a href="{{ route($item['route']) }}"
                        class="sidebar-sublink {{ $item['active'] ? 'active' : '' }}">
                        <span class="sidebar-sublink-dot" aria-hidden="true"></span>
                        <span class="sidebar-text">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="sidebar-group {{ $blogMenuActive ? 'is-open' : '' }}" data-sidebar-group>
            <button type="button"
                class="sidebar-link sidebar-group-toggle {{ $blogMenuActive ? 'active' : '' }}"
                aria-expanded="{{ $blogMenuActive ? 'true' : 'false' }}">
                <span class="sidebar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                        <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.12.201 0 .399.043.6.12.377.151.576.47.651.824.073.34.04.736-.046 1.136-.09.422-.26.837-.43 1.295a19.73 19.73 0 0 0 1.062 2.227 7.68 7.68 0 0 1 1.482.645c.371.22.7.48.897.787.21.326.275.714.08 1.102a.816.816 0 0 1-.438.42c-.293.096-.613-.04-.878-.295a8.405 8.405 0 0 1-.85-1.05 18.45 18.45 0 0 0-1.106-1.135c-.2-.15-.412-.226-.63-.226-.218 0-.43.076-.63.226a18.45 18.45 0 0 0-1.106 1.134 8.405 8.405 0 0 1-.85 1.051c-.265.255-.585.39-.878.295z"/>
                    </svg>
                </span>
                <span class="sidebar-text">Blog</span>
                <span class="sidebar-group-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </span>
            </button>

            <div class="sidebar-submenu">
                @foreach ($blogMenuItems as $item)
                    <a href="{{ route($item['route']) }}"
                        class="sidebar-sublink {{ $item['active'] ? 'active' : '' }}">
                        <span class="sidebar-sublink-dot" aria-hidden="true"></span>
                        <span class="sidebar-text">{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <a href="{{ route('events.index') }}"
            class="sidebar-link {{ request()->routeIs('events.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                </svg>
            </span>
            <span class="sidebar-text">Events</span>
        </a>

        <a href="{{ route('galleries.index') }}"
            class="sidebar-link {{ request()->routeIs('galleries.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-2.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                </svg>
            </span>
            <span class="sidebar-text">Galleries</span>
        </a>

        <a href="{{ route('settings.edit') }}"
            class="sidebar-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                </svg>
            </span>
            <span class="sidebar-text">Settings</span>
        </a>

        <a href="{{ route('profile.edit') }}"
            class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <span class="sidebar-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
            </span>
            <span class="sidebar-text">Profile</span>
        </a>
    </nav>
</aside>
