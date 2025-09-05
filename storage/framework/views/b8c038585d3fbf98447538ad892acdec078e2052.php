<?php $__env->startSection('content'); ?>
    <div class="have-stall">
       <div class="stall-wrapper">
           <h2>Already Have a Stall?</h2>

           <div class="stall-btn-container">

            <a href="<?php echo e(route('seller.stalls.has.select')); ?>" class="btn btn-primary" style="padding: 10px 28px;font-size: 12px;"> Yes </a>
            <a href="<?php echo e(route('seller.stalls.select')); ?>" class="btn btn-primary" style="padding: 10px 28px;font-size: 12px;"> No </a>

           </div>
       </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/haveanystalls.blade.php ENDPATH**/ ?>