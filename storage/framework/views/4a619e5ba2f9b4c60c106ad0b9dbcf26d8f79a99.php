<?php $__env->startSection('content'); ?>

<div class="products-grid" style="width:100%;">
<div class="product-item" style="margin:8rem;">
  <div class="product-image">
      <img src="<?php echo e(asset($sellerProduct->image)); ?>" alt="">
  </div>
  <div class="product-details">
    <h4 class="product-name"><?php echo e(($sellerProduct->custom_title != '' ? $sellerProduct->custom_title : $sellerProduct->product->product_name)); ?></h4>
    <p>Php <?php echo e(number_format($sellerProduct->price, 2)); ?></p>
        <form action="<?php echo e(route('cart.update')); ?>" method="POST" class="form-">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="seller_id" id="seller_id" value="<?php echo e($sellerProduct->seller_id); ?>">
              <input type="hidden" name="product_id" id="product_id" value="<?php echo e($sellerProduct->product_id); ?>">
              <input type="hidden" name="price" id="price" value="<?php echo e($sellerProduct->price); ?>">
              <input type="hidden" name="seller_product_id" id="seller_product_id" value="<?php echo e($sellerProduct->id); ?>">
              <input type="number" class="form-control-plaintext quantity" name="quantity" id="quantity" value="<?php echo e($cart->quantity); ?>" max="<?php echo e($sellerProduct->stock); ?>">
              <button class="btn btn-green update-btn" type="submit" <?php echo e(($sellerProduct->stock ? '' : 'disabled')); ?>>Update</button>
        </form>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/cart/edit.blade.php ENDPATH**/ ?>