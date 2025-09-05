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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($seller->user->first_name); ?></td>
                                <td><?php echo e($seller->user->last_name); ?></td>
                                <td><?php echo e($seller->user->email); ?></td>
                                <td><?php echo e($seller->seller_type); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.sellers.recover', $seller->id)); ?>"> Retrieve </a> | 
                                    <a href="<?php echo e(route('admin.sellers.permanentdelete', $seller->id)); ?>" title="Permanent Delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if( isset($_GET) ): ?>
                <?php echo e($sellers->appends($_GET)->links()); ?>

                <?php else: ?>
                <?php echo e($sellers->links()); ?>

                <?php endif; ?>
                <!-- <a href="<?php echo e(route('admin.stalls.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i> Create</a> -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/users/trash.blade.php ENDPATH**/ ?>