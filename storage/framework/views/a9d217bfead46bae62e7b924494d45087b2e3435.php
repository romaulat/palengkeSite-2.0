<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="profile">
        <div class="profile-wrapper">
            <div class="form-area">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-success }}"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                <?php if(($errors->any())): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert" id="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Reminder!</strong>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                    </div>
                <?php endif; ?>

                <div class="form-wrapper">
                    <h3><?php echo e('Change Password'); ?></h3>
                    <form method="POST" action="<?php echo e(route('admin.update.password')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label"><?php echo e(__('Password')); ?></label>
                            <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" autocomplete="new-password">
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
                            <label for="password-confirm" class="col-md-4 col-form-label"><?php echo e(__('Confirm Password')); ?></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            <div id="password-not-match" class="invalid-feedback" style="display:none; color:red; font-size:13px;">
                                Password does not match
                            </div>
                        </div>

                        <div class="row-btn">
                            <div class="btn-container">
                                <button type="submit" class="btn btn-secondary">
                                    <?php echo e(__('Update Password')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const passwordInput = document.getElementById('password');
    const passwordError = document.getElementById('password-error');
    const passwordConfirm = document.getElementById('password-confirm');
    const passwordNotMatch = document.getElementById('password-not-match');

    // document.addEventListener('input', function(event) {
    //     if (event.target.classList.contains('is-invalid')) {
    //         event.target.classList.remove('is-invalid');
    //     }
    // });

    // document.addEventListener('click', function(event) {
    //     if (event.target.classList.contains('is-invalid')) {
    //         event.target.classList.remove('is-invalid');
    //     }
    // });

    passwordInput.oninput = function() {
        if (passwordInput.value.length < 8) {
            passwordError.style.display = 'block';
        } else {
            passwordError.style.display = 'none';
            passwordInput.classList.remove('is-invalid'); // Remove the 'is-invalid' class
        }
    };

    passwordConfirm.oninput = function() {
        if (passwordConfirm.value !== passwordInput.value) {
            passwordNotMatch.style.display = 'block';
        } else {
            passwordNotMatch.style.display = 'none';
        }
    };
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/change-password.blade.php ENDPATH**/ ?>