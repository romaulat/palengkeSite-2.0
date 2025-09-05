<?php $__env->startSection('content'); ?>
<div class="container">
        <div class="profile">
            <div class="profile-wrapper">
                <form action="" method="GET"  class="form-group list-header" id="form-header">
                    <h3>Products</h3>

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

                
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Min Price</th>
                        <th>Max Price</th>
                        <th>SRP</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Pricing</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->product_name); ?></td>
                            <td><?php echo e($product->min_price); ?></td>
                            <td><?php echo e($product->max_price); ?></td>
                            <td><?php echo e($product->srp); ?></td>
                            <td><?php echo e($product->category->category); ?></td>
                            <td><?php echo e($product->type); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.products.recover', $product->id)); ?>"> Retrieve </a> | 
                                <a href="<?php echo e(route('admin.products.permanentdelete', $product->id)); ?>" title="Permanent Delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <?php if( isset($_GET) ): ?>
                <?php echo e($products->appends($_GET)->links()); ?>

                <?php else: ?>
                <?php echo e($products->links()); ?>

                <?php endif; ?>
                <!-- <a href="<?php echo e(route('admin.stalls.create')); ?>" class="info-header-edit"> <i class="fa fa-plus-circle"></i> Create</a> -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


</script>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/products/trash.blade.php ENDPATH**/ ?>