<?php $__env->startSection('content'); ?>
    <section class="categories">
        <div class="container">

            <div class="categories-grid">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('shop.product.category', ['category' => $category->slug])); ?>" class="item-category" style="background-image: url(<?php echo e(asset($category->image)); ?>)">
                        <div class="overlay"></div>
                        <h3><?php echo e($category->category); ?></h3>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/shop/categories.blade.php ENDPATH**/ ?>