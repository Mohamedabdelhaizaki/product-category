<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">


        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                @if (strtoupper(LaravelLocalization::getCurrentLocale()) == 'AR')
                    <img src="{{ asset('images/flags/eg.png') }}" alt="user-image" class="me-0 me-sm-1" height="12">
                @else
                    <img src="{{ asset('images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1" height="12">
                @endif
                <span
                    class="align-middle d-none d-sm-inline-block">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <!-- item-->
                    @if (strtoupper($localeCode) == 'AR')
                        <a href="{{ route('changeLang', ['lang' => $localeCode]) }}" class="dropdown-item notify-item">
                            <img src="{{ asset('images/flags/eg.png') }}" alt="user-image" class="me-1"
                                height="12">
                            <span class="align-middle">العربية</span>
                        </a>
                    @elseif(strtoupper($localeCode) == 'EN')
                        <a href="{{ route('changeLang', ['lang' => $localeCode]) }}" class="dropdown-item notify-item">
                            <img src="{{ asset('images/flags/us.jpg') }}" alt="user-image" class="me-1"
                                height="12">
                            <span class="align-middle">English</span>
                        </a>
                    @endif
                @endforeach

            </div>
        </li>


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{ asset('images/users/avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{ auth()->user()->name }}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">{{ __('Welcome') }}</h6>
                </div>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>

</div>
