<?php $__env->startSection('content'); ?>
    <div class="delivery-address">
       <div class="delivery-address-wrapper">
            <h3>My address</h3>

           <hr>


              <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="my-delivery-address-list">
                   <div class="my-delivery-address-item">
                       <div class="my-delivery-address-details">
                           <div class="details-up">
                               <div>
                                   <p class="delivery-address-detail-date">
                                       <?php echo e($address->stnumber  .' '. $address->barangay .', '. $address->city .', '.  $address->province .', '.  $address->country .' '.  $address->zip); ?>

                                   </p>
                                   <p class="delivery-address-detail-no"></p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>



                  
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           <a href="<?php echo e(route('buyer.delivery.address.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>

       </div>
   </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.buyer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/buyer/delivery_address/index.blade.php ENDPATH**/ ?>