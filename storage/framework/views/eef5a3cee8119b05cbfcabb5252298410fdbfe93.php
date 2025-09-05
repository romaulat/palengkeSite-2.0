<?php $__env->startSection('content'); ?>
    <div class="home-bg"> 
        <div class="overlay"></div>
        <section class="home">
           
            <div class="content" style="margin-top: 40px;">
                <span>Buy Now, Deliver Later</span>
                <h3>Fresh and Quality Products</h3>
                <p>To serve your Palengke needs right in your front door</p>
                <!-- <a href="<?php echo e(route('shop.products.index')); ?>" class="home-btn white-btn" style="text-decoration:none;">Products</a><br> -->
                <a href="#section2" class="home-btn white-btn" style="text-decoration:none;">Scroll Down for More <i class="fa fa-arrow-circle-down"></i></a><br>
                <!-- <a href="#section2" class="scroll-down"><i class="fa fa-angle-double-down"></i></a> -->
            </div>

        </section>
    </div>
    <div class="longbar green-bar">
        <div class="">
            <form action="<?php echo e(route('select.market')); ?>" method="POST" id="select-market">
                <?php echo csrf_field(); ?>
                <label for="">Mabini Public Market - </label>
                <select name="market_option"  class="" id="market-option">

                    <option value="">All</option>
                    <?php $__currentLoopData = \App\Market::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($market->id); ?>" <?php echo e(session()->get('shop_at_market') ==  $market->id ? 'selected' : ''); ?>><?php echo e($market->market); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </form>
        </div>
    </div>
    <section class="home-category" id="section2">

        <p class="category-subtitle">What we serve</p>
        <h1 class="title">shop by <span>category</span></h1>

        <div class="box-container" id="box-container">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <a href="<?php echo e(route('shop.product.category', ['slug' => $category->slug])); ?>"  >
                         <canvas style="background-image: url(<?php echo e(asset($category->image)); ?>)" class="box-item">

                         </canvas>
                        <div class="overlay"></div>
                         <h3><?php echo e($category->category); ?></h3>
                    </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="home-category-arrow">
            <i class="category-previous fa fa-angle-left">

            </i>
            <i class="category-next fa fa-angle-right">

            </i>
        </div>

    </section>

    <section class="home-products products container">

        <p class="product-subtitle">You may want to have</p>
        <h1 class="title">Featured <span>Products</span></h1>

        <div class="products-grid">

            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="product-item">

                    <a class="product-image" href="<?php echo e(route('shop.products.find', ['id' => $featuredProduct->id])); ?>">
                        <img src="<?php echo e(asset($featuredProduct->image)); ?>" alt="">
                    </a>
                    <div class="product-details">


                        <h4 class="product-name"><?php echo e(($featuredProduct->custom_title != '' ? $featuredProduct->custom_title : $featuredProduct->product->product_name)); ?></h4>
                        <p>Php <?php echo e(number_format($featuredProduct->price, 2)); ?></p>
                        <form action="<?php echo e(route('shop.product.addToCart')); ?>" method="POST">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="seller_id" id="seller_id" value="<?php echo e($featuredProduct->seller_id); ?>">
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo e($featuredProduct->product_id); ?>">
                            <input type="hidden" name="price" id="price" value="<?php echo e($featuredProduct->price); ?>">
                            <input type="hidden" name="seller_product_id" id="seller_product_id" value="<?php echo e($featuredProduct->id); ?>">
                            <input type="number" name="quantity" id="quantity" value="" max="<?php echo e($featuredProduct->stock); ?>">
                            <button class="add-to-cart btn btn-green" type="submit" <?php echo e(($featuredProduct->stock ? '' : 'disabled')); ?>><span class="fa fa-shopping-cart "></span> Add to Cart</button>
                        </form>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>


    </section>


    <section class="home-products products popular">

        <p class="product-subtitle">A must try</p>
        <h1 class="title">Most <span>Popular Items</span></h1>

        <div class="products-grid">

            <?php $__currentLoopData = $popularProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="product-item">

                    <a class="product-image" href="<?php echo e(route('shop.products.find', ['id' => $popularProduct->seller_product->id])); ?>">
                        <img src="<?php echo e(asset($popularProduct->seller_product->image)); ?>" alt="">
                    </a>
                    <div class="product-details">


                        <h4 class="product-name"><?php echo e(($popularProduct->custom_title != '' ? $popularProduct->custom_title : $popularProduct->product->product_name)); ?></h4>
                        <p>Php <?php echo e(number_format($popularProduct->seller_product->price, 2)); ?></p>
                        <form action="<?php echo e(route('shop.product.addToCart')); ?>" method="POST">

                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="seller_id" id="seller_id" value="<?php echo e($popularProduct->seller_id); ?>">
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo e($popularProduct->product_id); ?>">
                            <input type="hidden" name="price" id="price" value="<?php echo e($popularProduct->seller_product->price); ?>">
                            <input type="hidden" name="seller_product_id" id="seller_product_id" value="<?php echo e($popularProduct->seller_product->id); ?>">
                            <input type="number" name="quantity" id="quantity" value="" max="<?php echo e($popularProduct->seller_product->stock); ?>">
                            <button class="add-to-cart btn btn-green" type="submit" <?php echo e(($popularProduct->seller_product->stock ? '' : 'disabled')); ?>><span class="fa fa-shopping-cart "></span> Add to Cart</button>
                        </form>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>


    </section>

    <section class="home-products products container">

        <p class="product-subtitle">Get to know your suki</p>
        <h1 class="title">Our <span>Stores</span></h1>

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
                            <span class="fa fa-store"> </span>
                            View
                        </a>

                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>


    </section>


    <script>    
        function reveal() {
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 120;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
            }
        }

        window.addEventListener("scroll", reveal);

        const elements = {
            initSlick: function () {
                $(".home-category .box-container").slick({
                    slidesToShow:4,
                    slidesToScroll:1,
                    dots: false,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    infinite: true,
                    slide: 'div',
                    cssEase: 'linear',
                    prevArrow: jQuery('.home-category .category-previous'),
                    nextArrow: jQuery('.home-category .category-next'),
                    responsive: [
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll:1,
                                infinite: false,
                                dots: false
                            }
                        },

                    ]
                });
            },
            initFeaturedProducts: function () {

                $(" .products-grid").slick({
                    slidesToShow:4,
                    slidesToScroll:1,
                    dots: false,
                    autoplay: false,
                    autoplaySpeed: 5000,
                    infinite: true,
                    slide: 'div',
                    cssEase: 'linear',

                });
            }
        }

        $(document).ready(function(){
           elements.initSlick();
           // elements.initFeaturedProducts();
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/home/index.blade.php ENDPATH**/ ?>