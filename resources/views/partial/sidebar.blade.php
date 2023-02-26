<div class="leftside-menu">

    <a href="{{ route('home') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>
    <!-- LOGO -->
    <a href="{{ route('home') }}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('images/logo-dark.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('images/logo_sm_dark.png') }}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>
        @php($authenticated = auth()->user())
        <!--- Sidemenu -->
        <ul class="side-nav">


            <li class="side-nav-item {{ request()->routeIs('home') ? 'menuitem-active' : '' }}">

                <a href="{{ route('home') }}" class="side-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="uil-home"></i>
                    <span> {{ __('Home') }} </span>
                </a>
            </li>

            <li class="side-nav-item {{ request()->routeIs('products.*') ? 'menuitem-active' : '' }}">

                <a href="{{ route('products.index') }}"
                    class="side-nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    <i class="uil-cart"></i>
                    <span> {{ __('Products') }} </span>
                </a>
            </li>

            <li class="side-nav-item {{ request()->routeIs('categories.*') ? 'menuitem-active' : '' }}">

                <a href="{{ route('categories.index') }}"
                    class="side-nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="uil-list-ul"></i>
                    <span> {{ __('Categories') }} </span>
                </a>
            </li>
        </ul>

    </div>
    <!-- Sidebar -left -->

</div>
