<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <h3>Categories</h3>

                <?php if(session('message')): ?>
                    <div class="alert alert-<?php echo e((session('success') ? 'success' : 'danger')); ?>">
                        <strong><?php echo e(session('message')); ?></strong>
                    </div>
                <?php endif; ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->category); ?></td>
                                <td><img src="<?php echo e(asset('public/Image/'.$category->image)); ?>" alt=""></td>
                                <td>
                                  <a href="<?php echo e(route('admin.categories.recover', $category->id)); ?>"> Retrieve </a> | 
                                  <a href="<?php echo e(route('admin.categories.permanentdelete', $category->id)); ?>" title="Permanent Delete">Delete</a>
                                </td>

                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/categories/trash.blade.php ENDPATH**/ ?>