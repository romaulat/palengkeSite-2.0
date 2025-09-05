<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ $pageTitle ?? 'Palengkesite' }}</title>

      <!-- Scripts -->
      {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

      <!-- Fonts -->
      {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
      {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
      <link href="{{ asset('thirdparty/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
      

      <!-- Styles -->
      {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
      <link href="{{ asset('thirdparty/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('css/buyer/style.css') }}" rel="stylesheet">
      <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/sweetalert2/package/dist/sweetalert2.css') }}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/slick-1.8.1/slick/slick.css') }}" />


      <script type="text/javascript" src="{{ asset('thirdparty/js/jquery-3.6.0.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('thirdparty/js/bootstrap.js') }}"></script>
      <script type="text/javascript" src="{{ asset('thirdparty/slick-1.8.1/slick/slick.js') }}"></script>
      <script type="text/javascript" src="{{ asset('thirdparty/sweetalert2/package/dist/sweetalert2.js') }}"></script>

      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-palengkesite.ico') }}" />

      <style>
        .center-container{
          display: flex;
          align-items: center;
          justify-content: center;
          height: 100vh;
        }

        .border-reg{
          border: 1px black;
          border-style: inset;
          padding: 20px;
          width: 60%;
          background: var(--white);
        }

        body{
          background-blend-mode: darken;
          background: rgba(0,0,0,0.5) url(https://www.myresortsbatangas.com/wp-content/uploads/2015/06/anilao-port-mabini-batangas.jpg) no-repeat;
          background-position: center;
          background-size: cover;
          height: 100vh;
          position: relative;
        }

      </style>
  </head>
  <body>
    <div class="center-container">
      <div class="border-reg">
        @yield('content')

        @if(session('user_type'))
          @if(session('user_type') == 'buyer')
          <div class="profile-activation" style="text-align:center; text-transform: uppercase; font-size: 2.2rem;">
            <a href="#" style="text-decoration:none;">
              @if (auth()->user()->profile_image)
                <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
              @else
                View Profile
              @endif
            </a>
          </div>
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
          <div class="profile-activation" style="text-align:center; text-transform: uppercase; font-size: 2.2rem;">
            <a href="{{ route('seller.profile') }}" style="text-decoration:none;">
                {{-- {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}--}}
                @if (auth()->user()->profile_image)
                    <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                @else
                    View Profile
                @endif
            </a>
          </div>

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
            <div class="profile-activation" style="text-align:center; text-transform: uppercase; font-size: 2.2rem;">
                <a href="{{ route('buyer.profile') }}" style="text-decoration:none;">
                    {{--{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}--}}
                    @if (auth()->user()->profile_image)
                        <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                    @else
                      View Profile
                    @endif
                </a>
            </div>
            @else
              <div class="profile-activation" style="text-align:center; text-transform: uppercase;  font-size: 2.2rem;">
                <a href="{{ route('seller.profile') }}" style="text-decoration:none;">
                    @if (auth()->user()->profile_image)
                        <img class="profileImage"  src="{{ asset(auth()->user()->profile_image) }}" alt="" width="64" height="64" >
                    @else
                        View Profile
                    @endif
                    {{--{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}--}}
                </a>
              </div>
            @endif
        @endif
      </div>
    </div>
  </body>
</html>