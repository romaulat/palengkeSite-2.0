<?php $__env->startComponent('mail::message'); ?>
# Contact Us: <?php echo e($contact->subject); ?>


<p><strong>From: </strong><?php echo e($contact->name); ?> < <?php echo e($contact->from); ?> > </p>
<p><label for=""><strong>Subject: </strong></label> <?php echo e($contact->subject); ?></p>

<p><label for=""> <strong>Message: </strong></label></p>
<p> <?php echo e($contact->message); ?>  </p>






<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\palengkesite\resources\views/emails/contact-us.blade.php ENDPATH**/ ?>