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
    <link href="<?php echo e(asset('thirdparty/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/orders.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/seller/styles.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('thirdparty/sweetalert2/package/dist/sweetalert2.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('thirdparty/slick-1.8.1/slick/slick.css')); ?>" />
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/js/jquery-3.6.0.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/slick-1.8.1/slick/slick.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/sweetalert2/package/dist/sweetalert2.js')); ?>"></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/logo-palengkesite.ico')); ?>" />
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
                                <a href="<?php echo e(route('seller.profile')); ?>">
                                    <span class="icon"><i class="fas fa-user"></i></span>
                                    <span class="item">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('seller.switch.buyer')); ?>">
                                    <span class="icon"><i class="fas fa-people-arrows"></i></span>
                                    <span class="item">Switch as Buyer</span>
                                </a>
                            </li>

                            <!-- <li>
                                <a href="<?php echo e(route('index')); ?>">
                                    <span class="icon"><i class="fas fa-home"></i></span>
                                    <span class="item">Back to Site</span>
                                </a>
                            </li> -->
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
                <div class="section ">
                    <div class="top_navbar">
                        <div class="hamburger">
                            <a href="#">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>

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
                        <?php echo $__env->yieldContent('content'); ?>
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
                                        url:"<?php echo e(route('seller.getMessagesNotification')); ?>",
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
                            initSetUnread: function (trigger) {
                                trigger.click(function () {
                                    $.ajax({
                                        type:'GET',
                                        dataType:"json",
                                        url:"<?php echo e(route('seller.setUnread')); ?>",
                                        crossDomain:true,
                                        data: {
                                            _token: "<?php echo e(csrf_token()); ?>"
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
                                                    _token: "<?php echo e(csrf_token()); ?>"
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
<?php /**PATH C:\laragon\www\palengkesite\resources\views/layouts/seller-registration.blade.php ENDPATH**/ ?>