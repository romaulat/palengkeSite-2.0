<?php $__env->startSection('content'); ?>
    <section class="product container">

        <div class="product-wrapper ">
            <div class="product-top-area">
                <div class="product-img-area">


                    <?php if($sellerStall->seller_stall_images()->exists()): ?>

                        <div id="slide-for">
                            <?php $__currentLoopData = $sellerStall->seller_stall_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="stall-img">
                                        <img src="<?php echo e(asset( $image->image )); ?>" alt="">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div id="slide-nav" class="">
                            <?php $__currentLoopData = $sellerStall->seller_stall_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <div class="stall-img">
                                        <img src="<?php echo e(asset($image->image)); ?>" alt="">
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div id="slide-for">
                            <div>
                                <div class="stall-main-img">
                                    <img src="<?php echo e(asset($sellerStall->stall->image)); ?>" alt="">
                                </div>
                            </div>
                            <?php for($i=1; $i<=5; $i++): ?>
                                <?php $imagekey = 'image_'.$i; ?>
                                <?php if($sellerStall->stall[$imagekey]): ?>
                                    <div>
                                        <div class="stall-img">
                                            <img src="<?php echo e(asset($sellerStall->stall[$imagekey])); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <div id="slide-nav" class="">
                            <div>
                                <div class="stall-img">
                                    <img src="<?php echo e(asset($sellerStall->stall->image)); ?>" alt="">
                                </div>
                            </div>
                            <?php for($i=1; $i<=5; $i++): ?>
                                <?php $imagekey = 'image_'.$i; ?>
                                <?php if($sellerStall->stall[$imagekey]): ?>
                                    <div>
                                        <div class="stall-img">
                                            <img src="<?php echo e(asset($sellerStall->stall[$imagekey])); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>

                </div>
                <div class="product-details-area">
                    <div class="details-top">
                        <h4 class="product-name"><?php echo e($sellerStall->name); ?></h4>
                        <p class="seller-name"><i class="fa fa-user"></i> : <span class="seller-name"><?php echo e($sellerStall->seller->user->first_name); ?></span></p>
                        <p class="seller-name"><i class="fa fa-address-book"></i> : <span class="seller-name"><?php echo e($sellerStall->seller->user->mobile); ?></span></p>
                    </div>
                    <a href="<?php echo e(route('buyer.chat.seller', ['id' => $sellerStall->id])); ?>" class="pal-button btn-orange"><span class="fa fa-envelope" ></span> Message</a>
                    <hr>

                    <div class="details-middle">

                    </div>

                </div>
            </div>

        </div>


    </section>
    <div class="product-bottom-area">

        <h1 class="title">Store <span>Products</span></h1>
        <div class="container shop-wrapper" style="display: flex; flex-flow: row wrap; padding: 25px">

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
                            <img src="<?php echo e(asset($product->image)); ?>" alt="">
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
                                <input type="number" name="quantity" id="quantity" value="" max="<?php echo e($product->stock); ?>">
                                <button class="add-to-cart btn btn-orange" type="submit" <?php echo e(($product->stock ? '' : 'disabled')); ?>>
                                    <span class="fa fa-shopping-cart"></span>
                                    Add to Cart</button>
                            </form>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <script>

        var doc = $(document);
        var productDetail = {
            onInit: function(){
                productDetail.setRatings($('span.rating'));
                // productDetail.hoverRatings($('span.rating'));
                // productDetail.postRating($(''))
            },

            setRatings: function (trigger) {
                trigger.click(function () {

                    var self = $(this);

                    var rating = self.data('rating');

                    $('input[name="ratings"]').val(rating);
                    $('span.rating').removeClass('active');


                    for (rating; rating > 0; rating--){
                        $('span[data-rating="'+ rating +'"]').addClass('active');
                    }


                });
            },

            hoverRatings: function(trigger){
                trigger.mouseover(function () {

                    var self = $(this);

                    var rating = self.data('rating');

                    $('input[name="ratings"]').val(rating);
                    $('span.rating').removeClass('active');


                    for (rating; rating > 0; rating--){
                        $('span[data-rating="'+ rating +'"]').addClass('active');
                    }


                });
            },
            postRating: function () {

                $('form#post-comment').submit();

            }
        }

        doc.ready(function () {

            productDetail.onInit();

            $('#slide-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: false,
                fade: true,
                asNavFor: '#slide-nav'
            });

            $('#slide-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                asNavFor: '#slide-for',
                dots: false ,
                centerMode: true,
                focusOnSelect: true
            });
        })



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/shop/stalls/find.blade.php ENDPATH**/ ?>