<header class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid">
        <button id="sidebarToggle" class="btn btn-outline-secondary d-lg-none me-3" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{ route('parent.dashboard') }}">Parent Portal</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <a class="nav-link text-muted" href="#"><i class="fas fa-bell"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="parentProfileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&color=7F9CF5&background=EBF4FF' }}" alt="Profile" class="rounded-circle" width="32" height="32">
                        <span class="ms-2">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="parentProfileDropdown">
                        <li><a class="dropdown-item" href="{{ route('parent.profile.index') }}"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('parent.settings.index') }}"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
