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
        <?php echo $__env->yieldContent('content'); ?>

        <?php if(session('user_type')): ?>
          <?php if(session('user_type') == 'buyer'): ?>
          <div class="profile-activation" style="text-align:center; text-transform: uppercase; font-size: 2.2rem;">
            <a href="#" style="text-decoration:none;">
              <?php if(auth()->user()->profile_image): ?>
                <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
              <?php else: ?>
                View Profile
              <?php endif; ?>
            </a>
          </div>
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
          <div class="profile-activation" style="text-align:center; text-transform: uppercase; font-size: 2.2rem;">
            <a href="<?php echo e(route('seller.profile')); ?>" style="text-decoration:none;">
                
                <?php if(auth()->user()->profile_image): ?>
                    <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                <?php else: ?>
                    View Profile
                <?php endif; ?>
            </a>
          </div>

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
            <div class="profile-activation" style="text-align:center; text-transform: uppercase; font-size: 2.2rem;">
                <a href="<?php echo e(route('buyer.profile')); ?>" style="text-decoration:none;">
                    
                    <?php if(auth()->user()->profile_image): ?>
                        <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                    <?php else: ?>
                      View Profile
                    <?php endif; ?>
                </a>
            </div>
            <?php else: ?>
              <div class="profile-activation" style="text-align:center; text-transform: uppercase;  font-size: 2.2rem;">
                <a href="<?php echo e(route('seller.profile')); ?>" style="text-decoration:none;">
                    <?php if(auth()->user()->profile_image): ?>
                        <img class="profileImage"  src="<?php echo e(asset(auth()->user()->profile_image)); ?>" alt="" width="64" height="64" >
                    <?php else: ?>
                        View Profile
                    <?php endif; ?>
                    
                </a>
              </div>
            <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html><?php /**PATH C:\laragon\www\palengkesite\resources\views/layouts/verified.blade.php ENDPATH**/ ?>