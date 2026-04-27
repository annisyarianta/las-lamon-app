<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a
                        href="https://share.google/vFrNqsUovGGCNIGuD" class="text-white">Hutan, Lampung, 35158</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">hubungi@gawaimu.id</a></small>
            </div>
            <div class="top-link pe-2 text-light">
                Green Action Starts With You!
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="text-primary display-6">Las Lamon</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    @guest
                        <a href="{{ url('/') }}"
                            class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}"
                            class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route('catalogue.index') }}"
                            class="nav-item nav-link {{ request()->routeIs('catalogue.index') ? 'active' : '' }}">Catalogue</a>
                    @endguest

                    @auth
                        @if (auth()->user()->role === 'adopter')
                            <a href="{{ url('/') }}"
                                class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                            <a href="{{ route('about') }}"
                                class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                            <a href="{{ route('catalogue.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('catalogue.index') ? 'active' : '' }}">Catalogue</a>
                            <a href="{{ route('adopter.order.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('adopter.order.index') ? 'active' : '' }}">My
                                Order</a>
                            <a href="{{ route('adopter.myforest.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('adopter.myforest.index') ? 'active' : '' }}">My
                                Forest</a>
                        @endif
                    @endauth

                    @auth
                        @if (auth()->user()->role === 'lsm')
                            <a href="{{ route('lsm.dashboard.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('lsm_dashboard') ? 'active' : '' }}">Dashboard</a>
                            <a href="{{ route('lsm.order.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('lsm_dataorder') ? 'active' : '' }}">Data
                                Order</a>
                            <a href="{{ route('location.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('lsm_location') ? 'active' : '' }}">Location</a>
                        @endif
                    @endauth

                    @auth
                        @if (auth()->user()->role === 'superadmin')
                            <a href="{{ route('superadmin_dashboard') }}"
                                class="nav-item nav-link {{ request()->routeIs('superadmin_dashboard') ? 'fw-bold active' : '' }}">
                                Dashboard
                            </a>

                            <a href="{{ route('users.index') }}"
                                class="nav-item nav-link {{ request()->routeIs('users.index') ? 'fw-bold active' : '' }}">
                                User
                            </a>
                        @endif
                    @endauth
                </div>
                <div class="d-flex m-3 me-0">
                    @guest
                        <a href="{{ url('adopter/cart') }}" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0
                            </span>
                        </a>
                    @endguest
                    @auth
                        @if (auth()->user()->role === 'adopter')
                            <a href="{{ url('adopter/cart') }}" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span
                                    class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                    style="top: -5px; left: 15px; height: 20px; min-width: 20px;">

                                    @php
                                        $cartItemCount = 0;
                                        if (auth()->check() && auth()->user()->carts) {
                                            $cartItemCount = DB::table('carts')
                                                ->where('id_user', auth()->user()->id)
                                                ->where('soft_delete', 0)
                                                ->count();
                                        } else {
                                            $cartItemCount = 0;
                                        }

                                    @endphp

                                    {{ $cartItemCount }}</span>
                            </a>
                        @endif
                    @endauth

                    @auth
                        <span class="me-3 px-3 py-1 bg-light text-primary fw-semibold rounded-pill">
                            <i class="fas fa-user me-1"></i> {{ auth()->user()->name }}
                        </span>

                        <a href="#" class="my-auto"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-lg"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ url('/login') }}" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->
