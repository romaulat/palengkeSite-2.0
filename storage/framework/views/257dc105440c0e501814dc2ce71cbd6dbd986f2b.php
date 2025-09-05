<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <h3>Products</h3>
                <table class="table table-bordered">
            <thead>
                <tr>

                    <th>Product Name</th>
                    <th>SRP</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $seller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                    <tr>
                        <td><?php echo e($seller_product->product->product_name); ?></td>
                        <td><?php echo e($seller_product->product->srp); ?></td>
                        <td><?php echo e($seller_product->price); ?></td>
                        <td><?php echo e($seller_product->product->category->category); ?></td>
                        <td><?php echo e($seller_product->type); ?></td>
                        <td><?php echo e($seller_product->product->status); ?></td>
                        <td>
                          <a href="<?php echo e(route('seller.products.recover', $seller_product->id)); ?>"> Retrieve </a> | 
                          <a href="<?php echo e(route('seller.products.permanentdelete', $seller_product->id)); ?>" title="Permanent Delete">Delete</a>
                        </td>
                    </tr>
                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a href="<?php echo e(route('seller.products.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/products/trash.blade.php ENDPATH**/ ?>