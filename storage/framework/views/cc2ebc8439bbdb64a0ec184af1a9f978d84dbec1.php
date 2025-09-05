<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($pageTitle ?? 'Palengkesite'); ?></title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    
    
    <link href="<?php echo e(asset('thirdparty/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    

    <!-- Styles -->
    
    <link href="<?php echo e(asset('thirdparty/css/bootstrap.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/buyer/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/shop.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('thirdparty/sweetalert2/package/dist/sweetalert2.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('thirdparty/slick-1.8.1/slick/slick.css')); ?>" />


    <script type="text/javascript" src="<?php echo e(asset('thirdparty/js/jquery-3.6.0.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/slick-1.8.1/slick/slick.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('thirdparty/sweetalert2/package/dist/sweetalert2.js')); ?>"></script>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/logo-palengkesite.ico')); ?>" />


    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>
</head>
<body>
    <div >
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>
            window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
        ]); ?>;
        </script>
        <main class="">
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

            <?php if(  \Illuminate\Support\Facades\Route::currentRouteName() != 'index'): ?>
                <?php if(isset($innerPageBanner)): ?>


                        <?php if($innerPageBanner != ''): ?>
                            <section class="banner" style="background-image: url(<?= asset($innerPageBanner) ?>)">
                                <div class="overlay"></div>
                                <h1><?php echo e($pageTitle ?? ''); ?></h1>
                            </section>
                         <?php else: ?>
                                <section class="banner" style="background-image: url('<?php echo e(asset('images/defaults/inner-page-banner.jpg')); ?>')">
                                    <div class="overlay"></div>
                                    <h1><?php echo e($pageTitle ?? ''); ?></h1>
                                </section>
                       <?php endif; ?>
                        
                <?php else: ?>
                    <section class="banner" style="background-image: url('<?php echo e(asset('images/defaults/inner-page-banner.jpg')); ?>')">
                        <div class="overlay"></div>
                    </section>

                <?php endif; ?>
            <?php endif; ?>


            <?php if(  \Illuminate\Support\Facades\Route::currentRouteName() != 'index' && \Illuminate\Support\Facades\Route::currentRouteName() != 'shop.products.find'): ?>
                <div class="longbar green-bar">
                    <div class="">
                        <form action="<?php echo e(route('select.market')); ?>" method="POST" id="select-market">
                            <?php echo csrf_field(); ?>
                            <label for="">Mabini Public Market - </label>
                            <select name="market_option"  class="" id="market-option">
                                <option value="">All</option>
                                <?php $__currentLoopData = \App\Market::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($market->id); ?>" <?php echo e(session()->get('shop_at_market') ==  $market->id ? 'selected' : ''); ?>><?php echo e($market->market); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </form>
                    </div>
                </div>
            <?php endif; ?>
            


            <?php echo $__env->yieldContent('content'); ?>

        </main>


        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <script>
       const el = {
            initDetectScroll: function() {

                if($(window).scrollTop()  > 100 ) {
                    console.log('WORKING');
                        $('.navbar').addClass('fixed');
                    } else {
                        $('.navbar').removeClass('fixed');
                    }
            },
            changeMarket: function(trigger){

                trigger.change(function () {
                    $('#select-market').submit();
                });

            },
            initSlick: function(){
                // $('#box-container').slick({
                //     slidesToShow: 5,
                //     slidesToScroll: 1,
                //     infinite: true,
            
                //     dots: false ,
                //     focusOnSelect: true
                // });
            },
            initDeleteFunction: function (trigger) {
                trigger.click(function (e) {

                    let self = $(this);
                    let url = self.attr('data-href');

                    //seller, buyer, staff, stall etc..
                    let action =  self.attr('data-action-delete');

                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure you want to remove this '+ action +'?',
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
                        } 
                        else if (result.isDenied) {

                        }
                    })
                });

            },
       }

       $(window).on('scroll', function(){
            el.initDetectScroll();
       });

       $(window).on('load', function(){
            el.initSlick();
            el.changeMarket($('#market-option'));
            el.initDeleteFunction($('a[data-action-delete]'));
        });
    </script>
    
</body>
</html>
<?php /**PATH C:\laragon\www\palengkesite\resources\views/layouts/app.blade.php ENDPATH**/ ?>