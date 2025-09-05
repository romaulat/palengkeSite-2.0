
<nav class="navbar navbar-expand-md navbar-light ">
            <div class="container">

            <?php if( request()->is('/')): ?>
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <div class="bg-area" style="">
                        <div class="logo-area">
                            <img src="<?php echo e(asset('images/logo-palengkesite.png')); ?>" alt="Palengkesite" id="logo-image">
                        </div>
                    </div>
                </a>
            <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav" style="<?php echo e(!request()->is('/') ? 'margin: 40px 0;' : ''); ?>">

                        <!-- Authentication Links -->
                        <?php if( !request()->is('/')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('shop.categories')); ?>">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('shop.products.index')); ?>">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('shop.stores')); ?>">Stores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('about-us')); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('contact-us')); ?>">Contact</a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">

                                <?php if(session('user_type')): ?>
                                    <?php if(session('user_type') == 'buyer'): ?>
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php if(auth()->user()->profile_image): ?>
                                                <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                                            <?php else: ?>
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            <?php endif; ?>

                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                                <a class="nav-link dropdown-item" href="<?php echo e(route('buyer.profile')); ?>" style="padding: 0 25px 0 0;" >
                                                    <span class="fa fa-user"></span> <?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?>

                                                </a>
                                                <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>" style="padding: 0 25px 0 0;"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    <span class="fa fa-power-off"></span>  <?php echo e(__('Logout')); ?>

                                                </a>


                                                <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </div>
                                    <?php else: ?>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="<?php echo e(route('seller.profile')); ?>" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            
                                            <?php if(auth()->user()->profile_image): ?>
                                                <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                                            <?php else: ?>
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            <?php endif; ?>
                                            

                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    <?php echo e(__('Logout')); ?>

                                                </a>

                                                <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                            </div>

                                    <?php endif; ?>

                                <?php else: ?>
                                    <?php if(auth()->user()->user_type_id == 1): ?>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="<?php echo e(route('buyer.profile')); ?>" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            
                                            <?php if(auth()->user()->profile_image): ?>
                                                <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                                            <?php else: ?>
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            <?php endif; ?>
                                        </a>
                                    <?php else: ?>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="<?php echo e(route('seller.profile')); ?>" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <?php if(auth()->user()->profile_image): ?>
                                                <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                                            <?php else: ?>
                                                <i class="fa fa-user" style="font-size: 28px;"></i>
                                            <?php endif; ?>
                                            
                                        </a>
                                    <?php endif; ?>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                <?php endif; ?>


                            </li>

                            <?php if(auth()->user()->buyer()->exists()): ?>
                                <?php if(auth()->user()->buyer && auth()->user()->buyer->carts && auth()->user()->buyer->carts->isNotEmpty()): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('cart.index')); ?>" style="min-width: 55px;">
                                        <i class="fa fa-shopping-cart ">
                                            <span class="notif badge badge-danger">
                                                <?php echo e(auth()->user()->buyer->carts->count()); ?>

                                            </span>
                                        </i>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>


<?php /**PATH C:\laragon\www\palengkesite\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>