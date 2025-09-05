<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                        <h3>Stalls</h3>

                        <div class="list-header-fields">

                            <div class="form-group">
                                <label for="search">Search</label>
                                <input  class="form-control" type="text" name="search" id="search" value="<?php echo e(old('search') ??  $_GET['search']  ?? ''); ?>" placeholder="Search">
                            </div>


                            <div class="form-group">
                                <label for="search">Sort</label>
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

                <?php if(session('message')): ?>
                    <div class="alert alert-<?php echo e((session('success') ? 'success' : 'danger')); ?>">
                        <strong><?php echo e(session('message')); ?></strong>
                    </div>
                <?php endif; ?>
                
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Stall No.</th>
                        <th>Coordinates</th>
                        <th>Section</th>
                        <th>Area in sqm</th>
                        <th>Amount per sqm / Rate</th>
                        <th>Rental Fee</th>
                        <th>Annual Fee</th>
                        <th>Meter Number</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $stalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($stall->number); ?></td>
                            <td><?php echo e($stall->coords); ?></td>
                            <td><?php echo e($stall->section); ?></td>
                            <td><?php echo e($stall->sqm); ?></td>
                            <td><?php echo e($stall->amount_sqm); ?></td>
                            <td><?php echo e($stall->rental_fee); ?></td>
                            <td><?php echo e($stall->annual_fee); ?></td>
                            <td><?php echo e($stall->meter_num); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.stalls.recover', $stall->id)); ?>"> Retrieve </a> | 
                                <a href="<?php echo e(route('admin.stalls.permanentdelete', $stall->id)); ?>" title="Permanent Delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <?php if( isset($_GET ) ): ?>
                <?php echo e($stalls->appends($_GET)->links()); ?>


                <?php else: ?>
                    <?php echo e($stalls->links()); ?>

                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/stalls/trash.blade.php ENDPATH**/ ?>