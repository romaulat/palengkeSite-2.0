<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="grid">
            <div class="grid-wrapper">
                <?php if(count($stalls) > 0): ?>
                    <?php $__currentLoopData = $stalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('seller.stalls.has.create', [$stall->id])); ?>" class="grid-item">
                        <div class="grid-item-thumbnail">
                            <img src="<?php echo e(asset($stall->image)); ?>" alt="">
                        </div>
                        <div class="grid-item-details">
                            <p><strong>Stall No: </strong> <?php echo e($stall->number); ?></p>
                        </div>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php else: ?>
                    <h3>No Available Stall at this time. Please check again Later</h3>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/stalls/select-has-stall.blade.php ENDPATH**/ ?>