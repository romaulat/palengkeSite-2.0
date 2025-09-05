<?php $__env->startSection('content'); ?>
    <div class="shop">


        <div class="container shop-wrapper">

            <div class="filter-wrapper">
                    <form action="" id="filter" method="GET">
                        <div class="by-categories">
                            <div class="form-group">
                                <div class="form-group">
                                    <h3>Filter</h3>
                                    <label class="" for="">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo e(old('product_name') ?? $_GET['product_name'] ?? ''); ?>">
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


                        <div class="by-price">
                            <div class="form-group">

                                <label for="">Min. Price</label>
                                <input type="number" class="form-control" name="min_price" id="min_price" value="<?php echo e(old('min_price') ?? $_GET['min_price'] ?? ''); ?>">

                                <label for="">Max Price</label>
                                <input type="number" class="form-control" name="max_price" id="max_price" value="<?php echo e(old('max_price') ?? $_GET['max_price'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="by-ratings">
                            <?php for($i=1; $i <= 5; $i++): ?>
                                <div class="form-check">
                                    <input type="checkbox" name="ratings[]" value="<?php echo e($i); ?>" class="form-check-input" <?php echo e(( isset( $_GET['ratings']) && in_array($i, $_GET['ratings']) ? 'checked' : '')); ?>>
                                    <label class="form-check-label" for=""> <?php echo e($i); ?> Star Rating(s)
                                       <?php $n = 1; ?>
                                        <?php while($n <= 5): ?>
                                            <span class="product-rating <?php if($i >= $n): ?> active <?php else: ?> hide <?php endif; ?> fa fa-star" data-rating=""> </span>
                                            <?php $n++; ?>
                                        <?php endwhile; ?>
                                    </label>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="row-btn">
                            <button class="btn home-btn option-btn" type="submit">Apply Filter</button>
                        </div>

                    </form>
                </div>
            <div class="products-grid">

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="product-item" >

                            <a class="product-image" href="<?php echo e(route('shop.products.find', ['id' => $product->id])); ?>">
                                <img src="<?php echo asset($product->image); ?>" alt="">
                            </a>
                            <div class="product-details">
                                <h4><?php echo e(($product->custom_title != '' ? $product->custom_title : $product->product->product_name)); ?></h4>
                                <p>Php <?php echo e(number_format($product->price, 2)); ?></p>
                                <form action="<?php echo e(route('shop.product.addToCart')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="seller_id" id="seller_id" value="<?php echo e($product->seller_id); ?>">
                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo e($product->product_id); ?>">
                                    <input type="hidden" name="price" id="price" value="<?php echo e($product->price); ?>">
                                    <input type="hidden" name="seller_product_id" id="seller_product_id" value="<?php echo e($product->id); ?>">

                                    <span class="out-of-stock"><?php echo e(($product->stock) ? '' : 'Out of Stock'); ?></span>
                                    <hr>
                                    <label for="">Quantity</label>
                                    <input type="number" name="quantity" min="1" id="quantity" value="" max="<?php echo e($product->stock); ?>">
                                    <button class="add-to-cart btn btn-orange" type="submit" <?php echo e(($product->stock ? '' : 'disabled')); ?>>
                                        <span class="fa fa-shopping-cart"></span>
                                        Add to Cart</button>
                                </form>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/shop/index.blade.php ENDPATH**/ ?>