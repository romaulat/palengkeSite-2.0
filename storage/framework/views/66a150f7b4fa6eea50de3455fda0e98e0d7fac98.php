<?php $__env->startSection('content'); ?>

    <div class="form-area">
        <div class="form-wrapper">

            <form method="POST" action="<?php echo e(route('password.update')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="token" value="<?php echo e($token); ?>">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus>

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
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                    <div class="col-md-6">
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
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div id="password-not-match" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                            Password does not match
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="home-btn option-btn">
                            <?php echo e(__('Reset Password')); ?>

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


<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/auth/passwords/reset.blade.php ENDPATH**/ ?>