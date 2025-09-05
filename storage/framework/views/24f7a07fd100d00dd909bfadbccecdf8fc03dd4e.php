<?php $__env->startSection('content'); ?>
<div class="dashboard-flex">
    <!-- display flex -->
        <!-- columns 1 x 3 border: 1px solid #e3e3e3; border-radius:25px; flex: 1 1 33.3333% -->
        <div class="dashboard-column" id="seller-col">
            <a href="<?php echo e(route('admin.show.sellers.list')); ?>">
                <div class="column-content">
                    <div class="col-left">
                        <span class="icon-dashboard">
                            <i class="fa fa-users"></i>
                        </span>
                    </div>
                    <div class="col-right">
                        <h3><?php echo e($sellers); ?></h3>
                        <p>Active Sellers</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="dashboard-column" id="buyer-col">
            <a href="<?php echo e(route('admin.show.buyers.list')); ?>">
                <div class="column-content">
                    <div class="col-left">
                        <span class="icon-dashboard">
                            <i class="fa fa-users"></i>
                        </span>
                    </div>
                    <div class="col-right">
                        <h3><?php echo e($buyers); ?></h3>
                        <p>Active Buyers</p>
                    </div>
                </div>
            </a>
        </div>
        
        <?php if(auth()->guard('admin')->user()->is_super): ?>
        <a href="<?php echo e(route('admin.show.staff')); ?>">
        <div class="dashboard-column" id="staff-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-users"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3><?php echo e($staff); ?></h3>
                    <p>Staff</p>
                </div>
            </div>
        </a>
        </div>
        <?php endif; ?>

        <a href="<?php echo e(route('admin.appointments.show')); ?>">
        <div class="dashboard-column" id="appointment-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3><?php echo e($stallappointments); ?></h3>
                    <p>Pending Stall Appointment</p>
                </div>
            </div>
        </a>
        </div>

        <a href="<?php echo e(route('admin.seller.stalls.show')); ?>">
        <div class="dashboard-column" id="approval-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-user-shield"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3><?php echo e($stallapproval); ?></h3>
                    <p>Stall Approval</p>
                </div>
            </div>
        </a>
        </div>

        <a href="<?php echo e(route('admin.products.show')); ?>">
        <div class="dashboard-column" id="approval-col">    
            <div class="column-content">
                <div class="col-left">
                    <span class="icon-dashboard">
                        <i class="fa fa-cart-plus"></i>
                    </span>
                </div>
                <div class="col-right">
                    <h3><?php echo e($products); ?></h3>
                    <p>Product Approval</p>
                </div>
            </div>
        </a>
        </div>

        </div>
        <!-- columns 1 x 3 -->
    <!-- display flex -->

    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/index.blade.php ENDPATH**/ ?>