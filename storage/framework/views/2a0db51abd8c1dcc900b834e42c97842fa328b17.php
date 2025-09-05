<?php $__env->startSection('content'); ?>
    <div class="shop">

      
        <div class="container shop-wrapper">

            <div class="filter-wrapper">
                <form action="" id="filter" method="GET">
                    <div class="by-categories">
                        <div class="form-group">
                            <div class="form-group">
                                <h3>Filter</h3>
                                <label class="" for="">Store Name</label>
                                <input type="text" class="form-control" name="store_name" id="product_name" value="<?php echo e(old('store_name') ?? $_GET['store_name'] ?? ''); ?>">
                            </div>
                        </div>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check">
                                <input type="checkbox" name="categories[]" value="<?php echo e($category->id); ?>" class="form-check-input" <?php echo e(( isset( $_GET['categories']) && in_array($category->id, $_GET['categories']) ? 'checked' : '')); ?>>
                                <label class="form-check-label" for="">
                                    <?php echo e($category->category); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <div class="row-btn">
                        <button class="btn home-btn option-btn" type="submit">Apply Filter</button>
                    </div>

                </form>
            </div>
            <div class="products-grid">

                <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="product-item" >

                        <a class="product-image" href="<?php echo e(route('shop.store.find', ['id' => $store->id])); ?>">
                            <?php if( $store->seller_stall_images()->exists()): ?>
                                <img src="<?php echo e(asset( $store->seller_stall_images->first()->image )); ?>" alt="">
                            <?php else: ?>
                                <img src="<?php echo e(asset( $store->stall->image )); ?>" alt="">
                            <?php endif; ?>
                        </a>
                        <div class="product-details">
                            <h4><?php echo e($store->name ?? $store->seller->user->first_name . " Stall"); ?></h4>


                            <a class="view-store-btn btn btn-orange" type="submit" href="<?php echo e(route('shop.store.find', ['id' => $store->id])); ?>" >
                                <span class="fa fa-store"></span>
                                View
                            </a>

                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

        <script>

            let doc = $(document);
            var shop = {
                onInit: function () {
                    // shop.submitFilter($('#filter input'));
                },
                submitFilter: function (trigger) {
                    trigger.change(function () {
                        $('#filter').submit();
                    });
                }
            };

            doc.ready(function () {
                shop.onInit()
            })
        </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/shop/stalls/index.blade.php ENDPATH**/ ?>