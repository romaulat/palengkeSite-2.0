<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="profile">
            <div class="profile-wrapper">

               
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                    <h3>Users</h3>

                    <div class="list-header-fields">
                        
                        <div class="form-group">
                            <input  class="form-control" type="text" name="search" id="search" value="<?php echo e(old('search') ??  $_GET['search']  ?? ''); ?>" placeholder="Search">
                        </div>

                        
                        <div class="form-group">
                            <select  class="form-control" id="orderby" name="orderby" placeholder="Order By" value="" >
                                <option value="A-Z"     <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'A-Z' ) ? 'selected' : '' : '' ); ?>>Name (A-Z)</option>
                                <option value="Z-A"     <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'Z-A' ) ? 'selected' : '' : '' ); ?>>Name (Z-A)</option>
                                <option value="recent"  <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'recent' ) ? 'selected' : '' : '' ); ?>>Recent</option>
                                <option value="oldest"  <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'oldest' ) ? 'selected' : '' : '' ); ?>>Oldest</option>
                            </select>
                        </div>

                        <?php if(isset($_GET['page'])): ?>
                            <input type="hidden" name="page" value="<?php echo e($_GET['page']); ?>">
                        <?php endif; ?>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($staff->name); ?></td>
                                <td><?php echo e($staff->email); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.edit.staff', $staff->id)); ?>">Edit</a> | 
                                    <a href="#" data-action-delete="User" data-href="<?php echo e(route('admin.staffs.delete', $staff->id)); ?>"> Delete </a>
                                
                                </td>
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if( isset($_GET) ): ?>
                <?php echo e($staffs->appends($_GET)->links()); ?>

                <?php else: ?>
                <?php echo e($staffs->links()); ?>

                <?php endif; ?>
                <a href="<?php echo e(route('admin.register')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/users/staff.blade.php ENDPATH**/ ?>