<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Palengke Site</title>


    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('thirdparty/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('thirdparty/sweetalert2/package/dist/sweetalert2.css')); ?>" />
    <link href="<?php echo e(asset('thirdparty/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">


    <link href="<?php echo e(asset('css/seller/styles.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/buyer.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/orders.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('thirdparty/slick-1.8.1/slick/slick.css')); ?>" />
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/js/jquery-3.6.0.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/slick-1.8.1/slick/slick.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/sweetalert2/package/dist/sweetalert2.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/js/bootstrap.js')); ?>"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/logo-palengkesite.ico')); ?>" />
        <style>

        </style>
    </head>
    <body id="page-top">

        <div class="buyer">
            <!-- Page Wrapper -->


            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if(isset($response)): ?>
                        <script>
                            Swal.fire({
                                title: '<?php echo e(ucfirst($response)); ?>!',
                                text: '<?php echo e($message); ?>',
                                icon: '<?php echo e($response); ?>',
                                confirmButtonText: 'Ok'
                            })
                        </script>
                    <?php endif; ?>

                    <?php if(  session()->get('response')  ): ?>

                        <script>
                            Swal.fire({
                                title: '<?php echo e(ucfirst(session()->get('response'))); ?>!',
                                text: '<?php echo e(session()->get('message')); ?>',
                                icon: '<?php echo e(session()->get('response')); ?>',
                                confirmButtonText: 'Ok'
                            })
                        </script>
                    <?php endif; ?>
                    <main>
                        <div class="dashboard">
                            <div class="dashboard-box">
                                <div class="profile">
                                <?php if(auth()->user()->profile_image): ?>
                                    <img src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" id="profileImg">
                                <?php else: ?>
                                    <i class="fa fa-user" style="padding: 25px; font-size: 45px; color: white;"></i>
                                <?php endif; ?>
                                    <!-- <img src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" id="profileImg"> -->
                                    <div class="hi-profile">
                                        <h1>Hi, <span><?php echo e(auth()->user()->first_name); ?>!</span></h1>
                                    </div>

                                </div>
                                <ul>
                                    <li>
                                        <a href="<?php echo e(route('buyer.profile')); ?>">
                                            <span class="icon"><i class="fas fa-user"></i></span>
                                            <span class="item">Profile</span>
                                        </a>
                                    </li>

                                   <?php if(auth()->user()->buyer()->exists()): ?>
                                        <li>
                                            <a href="<?php echo e(route('buyer.orders.index')); ?>">
                                                <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                                                <span class="item">My Orders</span>
                                                <span class="notif badge badge-danger" id="orders-notif">
                                                        <?php echo e(auth()->user()->buyer->orders->where('status', 'pending')->count()); ?>

                                                 </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('buyer.delivery.address.index')); ?>">
                                                <span class="icon"><i class="fas fa-location-arrow"></i></span>
                                                <span class="item">Delivery Address</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?php echo e(route('buyer.chats')); ?>">
                                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                                <span class="item">Messages</span>

                                                    <?php if(auth()->user()->buyer->messages()->exists()): ?>
                                                 <span class="notif badge badge-danger" id="messages-notif">
                                                        <?php echo e(auth()->user()->buyer->messages->where('status', 'unread')->where('sender', 'buyer')->count()); ?>

                                                 </span>
                                                     <?php endif; ?>
                                            </a>
                                        </li>

                                    <?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('buyer.switch.seller')); ?>">
                                            <span class="icon"><i class="fas fa-people-arrows"></i></span>
                                            <span class="item">Switch as Seller</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('user.logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <span class="icon"><i class="fas fa-power-off"></i></span>
                                            <span class="item">Logout</span>
                                        </a>
                                        <form id="frm-logout" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="dashboard-content">
                            <?php echo $__env->yieldContent('content'); ?>
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
                                        url:"<?php echo e(route('buyer.getMessagesNotification')); ?>",
                                        crossDomain:true,
                                        data: {
                                            _token: "<?php echo e(csrf_token()); ?>"
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
                                        url:"<?php echo e(route('buyer.getOrdersNotification')); ?>",
                                        crossDomain:true,
                                        data: {
                                            _token: "<?php echo e(csrf_token()); ?>"
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
                                        url:"<?php echo e(route('buyer.setUnread')); ?>",
                                        crossDomain:true,
                                        data: {
                                            _token: "<?php echo e(csrf_token()); ?>"
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
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\laragon\www\palengkesite\resources\views/layouts/buyer.blade.php ENDPATH**/ ?>