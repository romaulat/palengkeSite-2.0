<?php $__env->startSection('content'); ?>

<section class="verification-acct" style="padding-top: 20px !important; text-align: center;">
    <div class="container">
        <div class="row">
            <?php if($result['response'] == 'error'): ?>
                <div class="col-lg-8 offset-lg-2">
                    <h2>Ooops..</h2>
                    <h4 style="color: red;"><?php echo($result['messages']); ?></h4>
                </div>
            <?php else: ?>
                <div class="col-lg-8 offset-lg-2">
                    <h2>Activation Complete!</h2>
                    <h4>Your Account has been successfully activated. You can now log in using the email and password you chose during the registration.</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.verified', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/verify.blade.php ENDPATH**/ ?>