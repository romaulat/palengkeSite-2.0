<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                    <h3>Stall Appointments</h3>

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
                            <th>Seller</th>
                            <th>Stall No.</th>
                            <th>Market</th>
                            <th>Date Created</th>
                            <th>Date of Appointment</th>
                            <th>Application Letter</th>
                            <!-- <th>Residency</th> -->
                            <th>2 x 2 Picture</th>
                            <th style="padding: 0 22px 5px 22px;">Valid IDs</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($appointment->seller->user->first_name); ?> <?php echo e($appointment->seller->user->last_name); ?></td>
                                <td> <?php echo e($appointment->stall->number); ?></td>
                                <td> <?php echo e($appointment->stall->market->market); ?></td>
                                <td> <?php echo e(date('m/d/Y', strtotime($appointment->created_at))); ?></td>
                                <td> <?php echo e(date('m/d/Y', strtotime($appointment->date))); ?></td>
                                <td> 
                                    <a href="<?php echo e(asset(  $appointment->application_letter )); ?>"  target="_blank">View</a>
                                </td>
                                <!-- <td> 
                                    <a href="<?php echo e(asset(  $appointment->residency )); ?>"  target="_blank">View</a>
                                </td> -->
                                <td> 
                                    <a href="<?php echo e(asset(  $appointment->image )); ?>"  target="_blank">View</a>
                                </td>
                                <td> 
                                    <a href="<?php echo e(asset(  $appointment->id1 )); ?>"  target="_blank">Valid ID 1</a><br>
                                    <a href="<?php echo e(asset(  $appointment->id2 )); ?>"  target="_blank">Valid ID 2</a>
                                </td>
                                <td> <?php echo e($appointment->status); ?></td>
                                <td>
                                    <?php if($appointment->status == 'pending'): ?>
                                        <form action="<?php echo e(route('admin.appointments.approve')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($appointment->id); ?>">
                                            <button type="submit" target="_blank" class="btn btn-primary"> Approve</button>
                                        </form>
                                    <?php else: ?>
                                        <div><?php echo e($appointment->status); ?></div>
                                    <?php endif; ?>

                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if( isset($_GET) ): ?>
                <?php echo e($appointments->appends($_GET)->links()); ?>

                <?php else: ?>
                <?php echo e($appointments->links()); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/appointments/index.blade.php ENDPATH**/ ?>