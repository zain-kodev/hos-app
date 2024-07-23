<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
    <a class="navbar-brand me-1 me-sm-3" href="{{ url('/') }}">
        <div class="d-flex align-items-center"><span class="font-sans-serif">2Lum Tickets</span>
        </div>
    </a>

    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

        <li class="nav-item dropdown">
            <a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="{{ asset('assets/img/logo.png') }}" alt="" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    {{--<a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>
                    <div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#!">Set status</a>--}}
{{--                    <a class="dropdown-item" href="{{ url('/') }}">Profile</a>--}}
{{--                    <a class="dropdown-item" href="#!">Feedback</a>--}}

{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="{{ url('/') }}">Settings</a>--}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

{{--                        <x-dropdown-link :href="route('logout')"--}}
{{--                                         onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                            {{ __('Log Out') }}--}}
{{--                        </x-dropdown-link>--}}
                    </form>
                    {{--<a class="dropdown-item" href="{{ url('/') }}">تسجيل الخروج</a>--}}
                </div>
            </div>
        </li>
    </ul>
</nav>
