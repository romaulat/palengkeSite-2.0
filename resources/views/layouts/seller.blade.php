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
    <link href="{{ asset('thirdparty/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/orders.css') }}" rel="stylesheet">
    <link href="{{ asset('css/seller/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/sweetalert2/package/dist/sweetalert2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('thirdparty/slick-1.8.1/slick/slick.css') }}" />
    <script type="text/javascript" src="{{ asset('thirdparty/js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('thirdparty/slick-1.8.1/slick/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('thirdparty/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('thirdparty/sweetalert2/package/dist/sweetalert2.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('thirdparty/chart.min.js') }}"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-palengkesite.ico') }}" />
    </head>
    <body id="page-top">

        <div class="seller">
            <!-- Page Wrapper -->
            <div class="wrapper">
                <div class="sidebar seller ">
                    <div class="sidebar-header">
                        <h3><i class="fa fa-desktop"></i> Seller Dashboard</h3>
                        <hr>
                    </div>
                    <div class="nav-seller" style="overflow-y: scroll; height: 580px;">
                        <ul>
                            <li>
                                <a href="{{ route('seller.profile') }}">
                                    <span class="icon"><i class="fas fa-user"></i></span>
                                    <span class="item">Profile</span>
                                </a>
                            </li>

                            @if(auth()->user()->seller()->exists())
                            <li>
                                <a href="{{ route('seller.stalls.show') }}">
                                    <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                                    <span class="item">My Stall</span>
                                </a>
                            </li>



                            @endif
                            @if(auth()->user()->seller()->exists())
                                @if(auth()->user()->seller->seller_stalls()->where('status', 'active')->count()  > 0)
                                    <li class="collapsed" data-toggle="collapse" data-target="#products_submenu">
                                        <a href="#"  class="">
                                            <span class="icon"><i class="fa fa-store"></i></span>
                                            <span class="item">Products</span>
                                        </a>
                                        <div class="collapse {{ (request()->segment(2) == 'products') ? 'show' : ''}}" id="products_submenu" aria-expanded="false">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('seller.products.show') }}" class="{{ ( request()->routeIs('seller.products.show') ? 'active' : '' )}}">
                                                        <span class="icon"><i class="fa fa-store"></i></span>
                                                        <span class="item">List</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('seller.products.trash') }}" class="{{ ( request()->routeIs('seller.products.trash') ? 'active' : '' )}}">
                                                        <span class="icon"><i class="fa fa-archive"></i></span>
                                                        <span class="item">Archive</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('seller.orders.show') }}">
                                            <span class="icon"><i class="fas fa-shipping-fast"></i></span>
                                            <span class="item">Orders</span>
                                            <span class="notif badge badge-danger" id="orders-notif">
                                                @if(auth()->user()->seller->orders()->exists())
                                                    {{ auth()->user()->seller->orders->where('status', 'pending')->count() }}
                                                @endif
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('seller.chats') }}">
                                            <span class="icon"><i class="fas fa-envelope"></i></span>
                                            <span class="item">Messages</span>
                                            <span class="notif badge badge-danger" id="messages-notif">
                                                @if(auth()->user()->seller->messages()->exists())
                                                    {{ auth()->user()->seller->messages->where('status', 'unread')->where('sender', 'buyer')->count() }}
                                                @endif
                                            </span>
                                        </a>
                                    </li>


                                    <li data-toggle="collapse" data-target="#sellers_submenu">
                                        <a href="#"  class="">
                                            <span class="icon"><i class="fas fa-chart-bar"></i></span>
                                            <span class="item">Sales</span>
                                        </a>
                                        <div class="collapse {{ (request()->segment(3) == 'products') ? 'show' : ''}}" id="sellers_submenu" aria-expanded="false">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('seller.analytics.product.sales') }}" class="{{ ( request()->routeIs('seller.analytics.product.sales') ? 'active' : '' )}}">
                                                        <span class="icon"><i class="fa fa-store"></i></span>
                                                        <span class="item">Products</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('seller.analytics.product.ratings') }}" class="{{ ( request()->routeIs('seller.analytics.product.ratings') ? 'active' : '' )}}">
                                                        <span class="icon"><i class="fa fa-star"></i></span>
                                                        <span class="item">Ratings</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endif
                            {{--<li>
                                <a href="#">
                                    <span class="icon"><i class="fas fa-database"></i></span>
                                    <span class="item">Development</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon"><i class="fas fa-chart-line"></i></span>
                                    <span class="item">Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="icon"><i class="fas fa-user-shield"></i></span>
                                    <span class="item">Admin</span>
                                </a>
                            </li>--}}
                            <li>
                                <a href="{{ route('seller.switch.buyer') }}">
                                    <span class="icon"><i class="fas fa-people-arrows"></i></span>
                                    <span class="item">Switch as Buyer</span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="{{ route('index') }}">
                                    <span class="icon"><i class="fas fa-home"></i></span>
                                    <span class="item">Back to Site</span>
                                </a>
                            </li> -->
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
                <div class="section ">
                    <div class="top_navbar">
                        <div class="hamburger">
                            <a href="#">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>

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
                        @yield('content')
                    </main>


                    <script>
                        const app = {
                            initCollapse: function(){
                                console.log('A script has been loaded');
                                app.initNotifMessage();
                                app.initSetUnread( $('#btn-input') );
                                app.initDeleteFunction($('a[data-action-delete]'));
                            },
                            initNotifMessage: function(){

                                setInterval(function(){
                                    $.ajax({
                                        type:'GET',
                                        dataType:"json",
                                        url:"{{route('seller.getMessagesNotification')}}",
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
                            initSetUnread: function (trigger) {
                                trigger.click(function () {
                                    $.ajax({
                                        type:'GET',
                                        dataType:"json",
                                        url:"{{route('seller.setUnread')}}",
                                        crossDomain:true,
                                        data: {
                                            _token: "{{ csrf_token() }}"
                                        },
                                        success:function(data) {

                                        }
                                    });
                                })
                            },
                            initDeleteFunction: function (trigger) {
                                trigger.click(function (e) {

                                    let self = $(this);
                                    let url = self.attr('data-href');

                                    //seller, buyer, staff, stall etc..
                                    let action =  self.attr('data-action-delete');

                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'Are you sure you want to delete this '+ action +'?',
                                        showDenyButton: true,
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                        denyButtonText: `No`,
                                    }).then((result) => {
                                        /* Read more about isConfirmed, isDenied below */
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                type:'GET',
                                                dataType:"json",
                                                url: url,
                                                crossDomain:true,
                                                data: {
                                                    _token: "{{ csrf_token() }}"
                                                },
                                                success:function(data) {
                                                    Swal.fire({
                                                        title: data.response + '!',
                                                        text: data.message,
                                                        icon: data.response,
                                                        confirmButtonText: 'Ok',

                                                    }).then((result) => {
                                                        location.reload(true);
                                                    });

                                                }
                                            });
                                        } else if (result.isDenied) {

                                        }
                                    })
                                });

                            },
                        };

                        $(document).ready(function () {
                            app.initCollapse();
                            $('.hamburger').click(function(){
                                if($('.sidebar').hasClass('opened')){

                                    $('.sidebar').removeClass('opened');
                                    $('.wrapper .section').addClass('opened');

                                }else{

                                    $('.sidebar').addClass('opened');
                                    $('.wrapper .section').addClass('opened');
                                }
                            });
                        });


                    </script>
                    <footer></footer>
                </div>
            </div>
            <!-- End of Page Wrapper -->
        </div>
    </body>
</html>
