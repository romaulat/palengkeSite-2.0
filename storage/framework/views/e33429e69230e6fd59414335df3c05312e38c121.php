<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
        <div class="profile-wrapper">

                        <h3>Market Information</h3>

                <?php if(session('message')): ?>
                    <div class="alert alert-<?php echo e((session('success') ? 'success' : 'danger')); ?>">
                        <strong><?php echo e(session('message')); ?></strong>
                    </div>
                <?php endif; ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Market</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($market->market); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.markets.edit', $market->id)); ?>">Edit</a>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <a href="<?php echo e(route('admin.markets.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/markets/show.blade.php ENDPATH**/ ?>