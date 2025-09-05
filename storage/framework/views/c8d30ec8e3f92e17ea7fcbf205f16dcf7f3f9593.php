<?php $__env->startComponent('mail::message'); ?>
# Welcome to Palengkesite!

<p>Thank you for signing up!</p>

<p>To get started, you must click the link below to activate your account.</p>

<?php $__env->startComponent('mail::button', ['url' => route('user.verify', ['email' => $data['email'], 'code' => $data['code']])]); ?>
ACTIVATION LINK HERE
<?php echo $__env->renderComponent(); ?>


Sincerely,
Palengkesite


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\palengkesite\resources\views/emails/welcome-email.blade.php ENDPATH**/ ?>