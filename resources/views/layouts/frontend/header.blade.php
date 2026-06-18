@php
    $companyActive = request()->is('about-us*', 'team*', 'research-and-development*', 'our-core-principles*');

    $navItems = [
        ['type' => 'link', 'label' => 'Home', 'url' => url('/'), 'active' => request()->is('/')],
       
        [
            'type' => 'dropdown',
            'label' => 'Company',
            'active' => $companyActive,
            'children' => [
                ['label' => 'About Us', 'url' => url('/about-us'), 'active' => request()->is('about-us')],
                ['label' => 'Our Team', 'url' => url('/team'), 'active' => request()->is('team')],
                ['label' => 'Research and Development', 'url' => url('/research-and-development'), 'active' => request()->is('research-and-development')],
                ['label' => 'Our Core Principles', 'url' => url('/our-core-principles'), 'active' => request()->is('our-core-principles')],
            ],
        ],
        ['type' => 'link', 'label' => 'Services', 'url' => url('/services'), 'active' => request()->is('services*')],
        ['type' => 'link', 'label' => 'Products', 'url' => url('/products'), 'active' => request()->is('products*')],
        ['type' => 'link', 'label' => 'Gallery', 'url' => url('/gallery'), 'active' => request()->is('gallery')],
        ['type' => 'link', 'label' => 'Events', 'url' => url('/events'), 'active' => request()->is('events*')],
        ['type' => 'link', 'label' => 'Blog', 'url' => url('/blog'), 'active' => request()->is('blog*')],
        ['type' => 'link', 'label' => 'Contact Us', 'url' => url('/contact-us'), 'active' => request()->is('contact-us')],
    ];
@endphp

<header class="frontend-header {{ request()->is('/') || request()->is('about-us', 'team', 'research-and-development', 'our-core-principles', 'contact-us', 'categories', 'products', 'products/*', 'blog', 'blog/*', 'events', 'events/*', 'gallery', 'services', 'services/*') ? 'frontend-header--hero' : 'frontend-header--static' }}">
    <div class="container">
        <div class="header-inner">
            <x-site-logo />

            <nav class="header-nav d-none d-lg-flex">
                <ul class="header-menu">
                    @foreach ($navItems as $item)
                        @if ($item['type'] === 'dropdown')
                            <li class="header-menu-item header-menu-item--dropdown {{ $item['active'] ? 'is-active' : '' }}">
                                <button type="button" class="header-menu-link header-menu-trigger {{ $item['active'] ? 'active' : '' }}" aria-expanded="false" aria-haspopup="true">
                                    <span>{{ $item['label'] }}</span>
                                    <svg class="header-menu-chevron" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                                <ul class="header-dropdown">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <a href="{{ $child['url'] }}"
                                                class="header-dropdown-link {{ $child['active'] ? 'active' : '' }}">
                                                {{ $child['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="header-menu-item">
                                <a href="{{ $item['url'] }}"
                                    class="header-menu-link {{ $item['active'] ? 'active' : '' }}">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>

            <div class="header-actions">
                <a href="#" class="btn header-cta">
                    <span>Download Brochure</span>
                    <span class="header-cta-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </span>
                </a>

                <button type="button" class="btn header-hamburger d-lg-none" id="mobileMenuToggle"
                    aria-label="Open menu" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>

<div class="mobile-sidebar-overlay" id="mobileSidebarOverlay"></div>

<aside class="mobile-sidebar" id="mobileSidebar" aria-hidden="true">
    <div class="mobile-sidebar-header">
        <x-site-logo :icon-size="20" />
        <button type="button" class="btn mobile-sidebar-close" id="mobileSidebarClose" aria-label="Close menu">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </button>
    </div>

    <nav class="mobile-sidebar-nav">
        <ul class="mobile-menu">
            @foreach ($navItems as $item)
                @if ($item['type'] === 'dropdown')
                    <li class="mobile-menu-item mobile-menu-item--dropdown {{ $item['active'] ? 'is-open' : '' }}">
                        <button type="button" class="mobile-menu-toggle {{ $item['active'] ? 'active' : '' }}">
                            <span>{{ $item['label'] }}</span>
                            <svg class="mobile-menu-chevron" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </button>
                        <ul class="mobile-submenu">
                            @foreach ($item['children'] as $child)
                                <li>
                                    <a href="{{ $child['url'] }}"
                                        class="mobile-submenu-link {{ $child['active'] ? 'active' : '' }}">
                                        {{ $child['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ $item['url'] }}"
                            class="mobile-menu-link {{ $item['active'] ? 'active' : '' }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>

    <div class="mobile-sidebar-footer">
        <a href="#" class="btn header-cta btn-block">
            <span>Download Brochure</span>
            <span class="header-cta-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
        </a>
    </div>
</aside>
