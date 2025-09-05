<?php $__env->startSection('content'); ?>
    <div class="profile">
       <div class="profile-wrapper">
           <div class="card basic-info" style="width: 18rem;">
               <div class="card-header basic-info-header">
                   Basic Information

                   <a href="<?php echo e(route('seller.edit')); ?>" class="info-header-edit"> <i class="fa fa-edit"></i></a>
               </div>
                <div class="basic-info-body">
                    <div class="info-body-flex">
                        <div class="form-group info-item short">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name"  placeholder="First Name" value="<?php echo e(auth()->user()->first_name); ?>" readonly>
                        </div>
                        <div class="form-group info-item short">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name"  placeholder="Last Name" value=" <?php echo e(auth()->user()->last_name); ?>" readonly>
                        </div>

                        <div class="form-group info-item short">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"  placeholder="Email" value=" <?php echo e(auth()->user()->email); ?>" readonly>
                        </div>

                        <div class="form-group info-item short prepend">
                            <label for="mobile">Mobile</label>
                            <div class="input-group-prepend info-item-prepend">
                                <span class="input-group-text" id="basic-addon1">+63</span>
                            </div>
                            <input type="text" class="form-control" id="mobile"  placeholder="Mobile" value=" <?php echo e(auth()->user()->mobile); ?>" readonly>
                        </div>

                        <?php if(auth()->user()->seller()->exists()): ?>
                            <div class="form-group info-item short">
                                <label for="email">Birthday</label>
                                <input type="text" class="form-control" id="birthday"  placeholder="Birthday" value="<?php echo e(date('m/d/Y', strtotime(auth()->user()->seller->birthday))); ?>" readonly>
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="email">Age</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e(auth()->user()->seller->age); ?>" readonly>
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="email">Gender</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e(auth()->user()->seller->gender); ?>" readonly>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
           </div>
       </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/profile.blade.php ENDPATH**/ ?>