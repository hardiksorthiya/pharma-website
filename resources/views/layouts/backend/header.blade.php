<header class="admin-header">
    <button type="button" class="btn sidebar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </button>

    <div class="admin-header-right ml-auto">
        <div class="dropdown">
            <button class="btn profile-toggle dropdown-toggle" type="button" id="profileDropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="profile-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                <span class="profile-name d-none d-md-inline">{{ Auth::user()->name }}</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
