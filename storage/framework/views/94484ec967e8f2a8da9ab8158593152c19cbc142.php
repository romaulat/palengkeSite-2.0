<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                    <h3>Products</h3>

                    <div class="list-header-fields">
                        <div class="form-group" style="justify-content: flex-end;">
                            <input  class="form-control" type="text" name="search" id="search" value="<?php echo e(old('search') ??  $_GET['search']  ?? ''); ?>" placeholder="Search">
                        </div>
                    </div>

                </form>

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
                            <a href="<?php echo e(route('seller.products.find', ['id' => $seller_product->id])); ?>">View </a>|
                            <a href="<?php echo e(route('seller.products.edit', $seller_product->id)); ?>">Edit </a>|
                            <a href="#" data-action-delete="Product" data-href="<?php echo e(route('seller.products.delete', $seller_product->id)); ?>"> Delete</a>
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

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/products/show.blade.php ENDPATH**/ ?>