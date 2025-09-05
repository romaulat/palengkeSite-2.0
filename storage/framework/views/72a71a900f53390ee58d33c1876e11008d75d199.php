<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <h3>Users</h3>
                
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
                                    <a href="<?php echo e(route('admin.developers.recover', $developer->id)); ?>"> Retrieve </a> |
                                    <a href="<?php echo e(route('admin.developers.permanentdelete', $developer->id)); ?>">Delete</a>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <!-- <a href="<?php echo e(route('admin.stalls.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i> Create</a> -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/about-us/trash.blade.php ENDPATH**/ ?>