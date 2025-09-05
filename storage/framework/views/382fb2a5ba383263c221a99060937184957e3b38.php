<?php $__env->startSection('content'); ?>

        <div class="form-area">

            <div class="form-wrapper">
                <h1><?php echo e('Register'); ?></h1>
                <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>

                 <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label "><?php echo e(__('First Name')); ?></label>


                        <input id="first_name" type="text" class="form-control <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="first_name" value="<?php echo e(old('first_name')); ?>"  autocomplete="first_name" autofocus>

                        <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?>
                        <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                   
                </div>

                 <div class="form-group">
                    <label for="name" class="col-md-4 col-form-label "><?php echo e(__('Last Name')); ?></label>


                    <input id="last_name" type="text" class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="last_name" value="<?php echo e(old('last_name')); ?>"  autofocus>

                    <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?>
                    <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>

                 <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label "><?php echo e(__('Email Address')); ?></label>


                    <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>"  autocomplete="email">

                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                    <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                </div>

                 <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label "><?php echo e(__('Password')); ?></label>

                        <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password"  autocomplete="new-password">
                        <div id="password-error" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                            Password must be at least 8 characters long
                        </div>

                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                        <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                </div>

                 <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label "><?php echo e(__('Confirm Password')); ?></label>


                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    
                    <div id="password-not-match" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                        Password does not match
                    </div>

                </div>
                <div class="form-inline">

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_type_id" id="user_type_id"  value="2" >
                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Seller')); ?>

                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_type_id" id="user_type_id"  value="1" >
                        <label class="form-check-label" for="remember">
                            <?php echo e(__('Buyer')); ?>

                        </label>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="">
                        <button type="submit" class="home-btn option-btn login-btn">
                            <?php echo e(__('Register')); ?>

                        </button>
                    </div>
                </div>
            </form>
            </div>
        </div>

        <script>
            const passwordInput = document.getElementById('password');
            const passwordError = document.getElementById('password-error');
            const passwordConfirm = document.getElementById('password-confirm')
            const passwordNotMatch = document.getElementById('password-not-match');

            passwordInput.oninput = function() {
                if (passwordInput.value.length < 8) {
                    passwordError.style.display = 'block';
                } else {
                    passwordError.style.display = 'none';
                }
            }

            passwordConfirm.oninput = function() {
                if (passwordConfirm.value !== passwordInput.value) {
                    passwordNotMatch.style.display = 'block';
                } else {
                    passwordNotMatch.style.display = 'none';
                }
            }

        </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/auth/register.blade.php ENDPATH**/ ?>