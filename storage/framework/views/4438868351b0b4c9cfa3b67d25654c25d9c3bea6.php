<?php $__env->startSection('content'); ?>



    <section class="cart">
        <form class="cart-container" action="<?php echo e(route('cart.checkout')); ?>" method="POST">

            <?php echo csrf_field(); ?>
           
            <div class="main-cart">
                <h3>Cart</h3>

                <div class="cart-items">
                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="cart-item">
                            <div class="product-check">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cart_ids[]" value="<?php echo e($cart->id); ?>" checked>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="">
                                    <img src="<?php echo e($cart->seller_product->image); ?>" alt="">
                                </a>
                            </div>
                            <div class="product-name"><?php echo e($cart->seller_product->product->product_name); ?></div>
                            <div class="product-price">Php <?php echo e($cart->seller_product->price); ?> x <?php echo e($cart->quantity); ?></div>
                            <div class="product-total"><?php echo e($cart->total); ?></div>
                            <a href="#" data-action-delete="Item" data-href="<?php echo e(route('cart.delete', $cart->id)); ?>" > <i class="fa fa-trash"></i></a>
                            <a href="<?php echo e(route('cart.edit', $cart->id)); ?>" > <i class="fa fa-edit"></i> </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
           

            <div class="button-area">
                <button type="submit">Checkout</button>
            </div>
        </form>
    </section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/cart/index.blade.php ENDPATH**/ ?>