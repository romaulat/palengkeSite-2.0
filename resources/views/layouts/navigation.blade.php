
<nav class="navbar navbar-expand-md navbar-light ">
            <div class="container">

            @if( request()->is('/'))
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="bg-area" style="">
                        <div class="logo-area">
                            <img src="{{ asset('images/logo-palengkesite.png') }}" alt="Palengkesite" id="logo-image">
                        </div>
                    </div>
                </a>
            @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav" style="{{ !request()->is('/') ? 'margin: 40px 0;' : '' }}">

                        <!-- Authentication Links -->
                        @if( !request()->is('/'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.categories') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.stores') }}">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-us') }}">Contact</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                @if(session('user_type'))
                                    @if(session('user_type') == 'buyer')
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (auth()->user()->profile_image)
                                                <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                                            @else
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            @endif

                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                                <a class="nav-link dropdown-item" href="{{ route('buyer.profile') }}" style="padding: 0 25px 0 0;" >
                                                    <span class="fa fa-user"></span> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('user.logout') }}" style="padding: 0 25px 0 0;"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    <span class="fa fa-power-off"></span>  {{ __('Logout') }}
                                                </a>


                                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                    @else
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('seller.profile') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{-- {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}--}}
                                            @if (auth()->user()->profile_image)
                                                <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                                            @else
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            @endif
                                            

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('user.logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>

                                    @endif

                                @else
                                    @if(auth()->user()->user_type_id == 1)
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('buyer.profile') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{--{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}--}}
                                            @if (auth()->user()->profile_image)
                                                <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                                            @else
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            @endif
                                        </a>
                                    @else
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('seller.profile') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            @if (auth()->user()->profile_image)
                                                <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                                            @else
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            @endif
                                            {{--{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}--}}
                                        </a>
                                    @endif
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('user.logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                @endif


                            </li>

                            @if(auth()->user()->buyer()->exists())
                                @if(auth()->user()->buyer && auth()->user()->buyer->carts && auth()->user()->buyer->carts->isNotEmpty())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart.index') }}" style="min-width: 55px;">
                                        <i class="fa fa-shopping-cart ">
                                            <span class="notif badge badge-danger">
                                                {{ auth()->user()->buyer->carts->count() }}
                                            </span>
                                        </i>
                                    </a>
                                </li>
                                @endif
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


