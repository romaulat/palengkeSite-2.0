<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $developers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $developer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(asset($developer->photo)); ?>" alt=""></td>
                                <td><?php echo e($developer->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.developers.edit', $developer->id)); ?>">Edit</a> |
                                    <a href="<?php echo e(route('admin.developers.delete', $developer->id)); ?>">Delete</a>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
        
      
        <a href="<?php echo e(route('admin.developers.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/about-us/show.blade.php ENDPATH**/ ?>