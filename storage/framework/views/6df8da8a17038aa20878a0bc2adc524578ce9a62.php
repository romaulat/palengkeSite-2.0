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

                            <div class="form-group">
                                <label for="search">Status</label>
                                <select  class="form-control" type="text" name="status" id="status"  placeholder="Status">
                                    <option value="">All</option>
                                    <option value="vacant" <?=  ( isset( $_GET['status'] ) ?  ( $_GET['status'] == 'vacant' ) ? 'selected' : '' : '' ); ?>>Vacant</option>
                                    <option value="occupied" <?=  ( isset( $_GET['status'] ) ?  ( $_GET['status'] == 'occupied' ) ? 'selected' : '' : '' ); ?>>Occupied</option>
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
                            <th>Stall No.</th>
                            <th>Coordinates</th>
                            <th>Section</th>
                            <th>Area in sqm</th>
                            <th>Amount per sqm / Rate</th>
                            <th>Rental Fee per Day</th>
                            <th>Annual Fee</th>
                            <th>Meter Number</th>
                            <th>Status</th>
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
                                <td><?php echo e($stall->status); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.stalls.edit', $stall->id)); ?>">Edit</a> |
                                    <a href="#" data-action-delete="Stall" data-href="<?php echo e(route('admin.stalls.delete', $stall->id)); ?>" > Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>


                <?php if( isset($_GET ) ): ?>
                <?php echo e($stalls->appends($_GET)->links()); ?>


                <?php else: ?>
                    <?php echo e($stalls->links()); ?>

                <?php endif; ?>

                <a href="<?php echo e(route('admin.stalls.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>


                <a href="<?php echo e(route('admin.stalls.export')); ?>?<?php echo e($request->getQueryString()); ?>" class="btn btn-primary"><span class="fa fa-download"></span> Downloads</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/stalls/show.blade.php ENDPATH**/ ?>