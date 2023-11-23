<nav class="navbar navbar-custom fixed-top navbar-expand-lg navbar-light bsb-navbar bsb-navbar-hover bsb-navbar-caret"
    aria-label="Offcanvas navbar large">
    <div class="container col-md-9 mx-auto">
        <a class="navbar-brand" href="{{url('/')}}"><img style="width:200px;"
                src="{{asset('uploads/logo/logo.svg')}}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2"
            aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-light" tabindex="-1" id="offcanvasNavbar2"
            aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label"><img style="width:200px;"
                        src="{{asset('uploads/logo/logo_2.svg')}}"></h5>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3 fs-6">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('products')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('helps')}}">Bantuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('blog')}}">blog</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                            <li><a class="dropdown-item" href="#!">Log in</a></li>
                            <li><a class="dropdown-item" href="#!">Lost Password?</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#!">Sign up</a></li>
                        </ul>
                    </li> --}}
                </ul>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    {{-- <a class="nav-link px-3" href="{{ url('cart') }}"><i class='bx bxs-shopping-bag-alt'></i> Cart
                        <span class="badge bg-primary rounded-pill">{{ count((array)
                            session('cart')) }}</span></a> --}}
                    @guest
                    @if (Route::has('register'))
                    {{-- <li class="nav-item me-2 my-auto">
                        <a class="nav-link btn btn-success btn-rounded btn-sm fs-6"
                            href="https://wa.me/{{$option_nav->whatsapp}}"><i class='bx bxl-whatsapp fs-5'></i>
                            {{$option_nav->phone}}</a>
                    </li> --}}
                    @endif
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class='bx bxs-user fs-5'></i>
                            {{__('Login') }}
                        </a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                            @if(Auth::user()->role == 1 || (Auth::user()->role == 2))
                            <li>
                                <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('member/dashboard') }}">
                                    Member Area
                                </a>
                            </li>
                            @else
                            <li><a class="dropdown-item" href="#!">Lost Password?</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>