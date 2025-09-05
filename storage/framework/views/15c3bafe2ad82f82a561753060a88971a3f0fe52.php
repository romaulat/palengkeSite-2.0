<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="profile">
        <div class="profile-wrapper">
            
            <div class="form-area">

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
                    <h3><?php echo e('Register'); ?></h3>
                    <form method="POST" action="<?php echo e(route('admin.store')); ?>">
                    <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="name" class="col-md-4 col-form-label "><?php echo e(__('Name')); ?></label>


                                <input id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" value="<?php echo e(old('name')); ?>"  autocomplete="name" autofocus>
                        
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label "><?php echo e(__('Email Address')); ?></label>


                            <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>"  autocomplete="email">

                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label "><?php echo e(__('Password')); ?></label>

                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password"  autocomplete="new-password">

                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label "><?php echo e(__('Confirm Password')); ?></label>


                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            

                        </div>

                        <div class="row-btn">
                            <div class="btn-container">
                                <button type="submit" class="btn btn-secondary">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/auth/admin/register.blade.php ENDPATH**/ ?>