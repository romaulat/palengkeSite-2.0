<?php $__env->startSection('content'); ?>



    <section class="cart">
        <form class="cart-container" action="<?php echo e(route('cart.checkout.selectPaymentMethod')); ?>" method="post">


            <?php echo csrf_field(); ?>

             <div class="payment-options">
                 <h2 style="text-align: center" class="col-md-12">Please Select Payment Method</h2>
                 <?php $__currentLoopData = $paymentOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="payment-option-item">'
                            <label for="">
                             <input class="form-check-input" type="radio" name="payment_method" value="<?php echo e($paymentOption->id); ?>">

                                 <img src="<?php echo e(( $paymentOption->payment_option == 'PayPal' ? asset('images/paypal.png') : asset('images/cod.png'))); ?>" alt="">
                                <h4><?php echo e($paymentOption->payment_option); ?></h4>
                             </label>

                     </div>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>

            <div class="button-area">
                <button type="submit">Proceed</button>
            </div>
        </form>
    </section>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/cart/choosePaymentMethod.blade.php ENDPATH**/ ?>