<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Palengke Site</title>


    <!-- Custom fonts for this template-->
    <link href="{{ asset('thirdparty/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
     <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/sweetalert2/package/dist/sweetalert2.css') }}" />
    <link href="{{ asset('thirdparty/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <link href="{{ asset('css/seller/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/buyer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/orders.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/slick-1.8.1/slick/slick.css') }}" />
    <script type="text/javascript" src="{{ asset('thirdparty/js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('thirdparty/slick-1.8.1/slick/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('thirdparty/sweetalert2/package/dist/sweetalert2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('thirdparty/js/bootstrap.js') }}"></script>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-palengkesite.ico') }}" />
        <style>

        </style>
    </head>
    <body id="page-top">

        <div class="buyer">
            <!-- Page Wrapper -->


            @include('layouts.navigation')
                    @if(isset($response))
                        <script>
                            Swal.fire({
                                title: '{{ ucfirst($response) }}!',
                                text: '{{ $message  }}',
                                icon: '{{ $response }}',
                                confirmButtonText: 'Ok'
                            })
                        </script>
                    @endif

                    @if(  session()->get('response')  )

                        <script>
                            Swal.fire({
                                title: '{{ ucfirst(session()->get('response')) }}!',
                                text: '{{ session()->get('message')  }}',
                                icon: '{{ session()->get('response') }}',
                                confirmButtonText: 'Ok'
                            })
                        </script>
                    @endif
                    <main>
                        <div class="dashboard">
                            <div class="dashboard-box">
                                <div class="profile">
                                @if (auth()->user()->profile_image)
                                    <img src="{{ asset(auth()->user()->profile_image)  }}" alt="" id="profileImg">
                                @else
                                    <i class="fa fa-user" style="padding: 25px; font-size: 45px; color: white;"></i>
                                @endif
                                    <!-- <img src="{{ asset(auth()->user()->profile_image)  }}" alt="" id="profileImg"> -->
                                    <div class="hi-profile">
                                        <h1>Hi, <span>{{ auth()->user()->first_name }}!</span></h1>
                                    </div>

                                </div>
                                <ul>
                                    <li>
                                        <a href="{{ route('buyer.profile') }}">
                                            <span class="icon"><i class="fas fa-user"></i></span>
                                            <span class="item">Profile</span>
                                        </a>
                                    </li>

                                   @if(auth()->user()->buyer()->exists())
                                        <li>
                                            <a href="{{ route('buyer.orders.index') }}">
                                                <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                                                <span class="item">My Orders</span>
                                                <span class="notif badge badge-danger" id="orders-notif">
                                                        {{ auth()->user()->buyer->orders->where('status', 'pending')->count() }}
                                                 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('buyer.delivery.address.index') }}">
                                                <span class="icon"><i class="fas fa-location-arrow"></i></span>
                                                <span class="item">Delivery Address</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('buyer.chats') }}">
                                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                                <span class="item">Messages</span>

                                                    @if(auth()->user()->buyer->messages()->exists())
                                                 <span class="notif badge badge-danger" id="messages-notif">
                                                        {{ auth()->user()->buyer->messages->where('status', 'unread')->where('sender', 'buyer')->count() }}
                                                 </span>
                                                     @endif
                                            </a>
                                        </li>

                                    @endif
                                    <li>
                                        <a href="{{ route('buyer.switch.seller') }}">
                                            <span class="icon"><i class="fas fa-people-arrows"></i></span>
                                            <span class="item">Switch as Seller</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <span class="icon"><i class="fas fa-power-off"></i></span>
                                            <span class="item">Logout</span>
                                        </a>
                                        <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dashboard-content">
                            @yield('content')
                        </div>


                    </main>


                    <script>
                        const app = {
                            initCollapse: function(){
                                console.log('A script has been loaded');
                                app.initNotifMessage();
                                app.initSetUnread( $('#btn-input'));
                            },
                            initNotifMessage: function(){

                                setInterval(function(){
                                    $.ajax({
                                        type:'GET',
                                        dataType:"json",
                                        url:"{{route('buyer.getMessagesNotification')}}",
                                        crossDomain:true,
                                        data: {
                                            _token: "{{ csrf_token() }}"
                                        },
                                        success:function(data) {
                                            $('#messages-notif').text(data);
                                        }
                                    });
                                }, 5000);
                            },
                            initNotifOrder: function(){

                                setInterval(function(){
                                    $.ajax({
                                        type:'GET',
                                        dataType:"json",
                                        url:"{{route('buyer.getOrdersNotification')}}",
                                        crossDomain:true,
                                        data: {
                                            _token: "{{ csrf_token() }}"
                                        },
                                        success:function(data) {
                                            $('#orders-notif').text(data);
                                        }
                                    });
                                }, 5000);
                            },
                            initSetUnread: function (trigger) {
                                trigger.click(function () {
                                    $.ajax({
                                        type:'GET',
                                        dataType:"json",
                                        url:"{{route('buyer.setUnread')}}",
                                        crossDomain:true,
                                        data: {
                                            _token: "{{ csrf_token() }}"
                                        },
                                        success:function(data) {

                                        }
                                    });
                                })
                            },
                        };

                        $(window).on('load', function(){
                            app.initCollapse();
                            app.initNotifOrder();
                            $('.hamburger').click(function(){
                                if($('.sidebar').hasClass('close')){
                                    $('.sidebar').removeClass('close');
                                    $('.wrapper .section').removeClass('open');
                                }else{
                                    $('.sidebar').addClass('close');
                                    $('.wrapper .section').addClass('open');
                                }
                            });
                        });


                    </script>

        </div>
        @include('layouts.footer')
    </body>
</html>
