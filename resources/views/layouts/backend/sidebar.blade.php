<aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">S</div>
        <span class="sidebar-logo-text">{{ config('app.name', 'Sanskruti Pharma') }}</span>
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
