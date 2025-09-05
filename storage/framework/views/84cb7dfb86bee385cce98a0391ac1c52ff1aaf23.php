<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <h3>Sellers with <strong><?php echo e($products->product_name); ?></strong></h3>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Seller Name</th>
                                <th>Stall No.</th>
                                <th>Selling Type</th>
                                <th>Seller Pricing</th>
                                <th>SRP</th>
                                <th>Min Price</th>
                                <th>Max Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $products->seller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>  <?php echo e($product->seller->user->first_name); ?> <?php echo e($product->seller->user->last_name); ?></td>
                                <td> <?php echo e($product->seller->seller_stalls->stall->number); ?></td>
                                <td> <?php echo e($product->type); ?></td>
                                <td> Php <?php echo e(($product->price) ? number_format($product->price, 2) : ''); ?></td>
                                <td> Php <?php echo e(($products->srp) ? number_format($products->srp, 2) : ''); ?></td>
                                <td> Php <?php echo e(($products->min_price) ? number_format($products->min_price, 2) : ''); ?></td>
                                <td> Php <?php echo e(($products->max_price) ? number_format($products->max_price, 2) : ''); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/pricing/show.blade.php ENDPATH**/ ?>