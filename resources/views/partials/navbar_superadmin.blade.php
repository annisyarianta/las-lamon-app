<!-- Navbar start -->
<div class="container-fluid fixed-top bg-white border-bottom">
    <div class="container px-0">
        <nav class="navbar navbar-expand-xl navbar-light">
            
            <!-- BRAND -->
            <a href="#" class="navbar-brand d-flex flex-column">
                <span class="h3 mb-0">Las Lamon</span>
                <small class="text-muted" style="font-size: 14px;">Dashboard Superadmin</small>
            </a>

            <!-- TOGGLER -->
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-dark"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{ route('superadmin_dashboard') }}"
                        class="nav-item nav-link {{ request()->routeIs('superadmin_dashboard') ? 'fw-bold active' : '' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('superadmin_user') }}"
                        class="nav-item nav-link {{ request()->routeIs('superadmin_user') ? 'fw-bold active' : '' }}">
                        User
                    </a>
                </div>

                <!-- RIGHT SIDE -->
                <div class="d-flex m-3 me-0 align-items-center">
                    @auth
                        <span class="me-3 px-3 py-1 bg-light text-primary fw-semibold rounded-pill">
                            <i class="fas fa-user me-1"></i> {{ auth()->user()->name }}
                        </span>

                        <a href="#" class="my-auto text-dark"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="my-auto text-dark">
                            <i class="fas fa-user fa-lg"></i>
                        </a>
                    @endauth
                </div>

            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->