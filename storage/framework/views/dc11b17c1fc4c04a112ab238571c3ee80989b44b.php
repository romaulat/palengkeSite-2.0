<?php $__env->startSection('content'); ?>
    <section class="product container">

        <div class="product-wrapper ">
            <div class="product-top-area">
                <div class="product-img-area">

                        <div id="slide-for">
                            <div>
                                <div class="product-main-image">
                                    <img src="<?php echo e(asset( $sellerProduct->image )); ?>" alt="">
                                </div>
                            </div>
                            <?php for($i=1; $i<=5; $i++): ?>
                                <?php $imagekey = 'image_'.$i; ?>
                                <?php if($sellerProduct[$imagekey]): ?>
                                    <div>
                                        <div class="product-main-image">
                                            <img src="<?php echo e(asset($sellerProduct[$imagekey])); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>

                        </div>
                        <div id="slide-nav" class="product-gallery">
                            <div>
                                <div class="product-img">
                                    <img src="<?php echo e(asset($sellerProduct->image)); ?>" alt="">
                                </div>
                            </div>
                            <?php for($i=1; $i<=5; $i++): ?>
                                <?php $imagekey = 'image_'.$i; ?>
                                <?php if($sellerProduct[$imagekey]): ?>
                                    <div>
                                        <div class="product-img">
                                            <img src="<?php echo e(asset( $sellerProduct[$imagekey] )); ?>" alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>

                </div>
                <div class="product-details-area">
                    <div class="details-top">

                        <div class="average-ratings">
                            <?php if($sellerProduct->average_ratings): ?>

                                <?php list($whole, $decimal) = explode('.', $sellerProduct->average_ratings) ?>

                                <h3>
                                    <?php for($i=1; $i <= 5; $i++): ?>
                                        <?php if($i <= $whole): ?>
                                            <span class="product-rating active fa fa-star" data-rating="" style="position: relative; overflow: hidden"> </span>
                                        <?php else: ?>
                                            <span class="product-rating fa fa-star" data-rating="" style="position: relative; overflow: hidden"> </span>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <?php echo e($sellerProduct->average_ratings); ?>

                                </h3>

                            <?php else: ?>
                                No Ratings yet.
                            <?php endif; ?>
                        </div>

                        <h4 class="product-name"><?php echo e(($sellerProduct->custom_title != '' ? $sellerProduct->custom_title : $sellerProduct->product->product_name)); ?></h4>
                        <p class="seller-name"><i class="fa fa-store"></i> <span class="stall-name"><?php echo e($sellerProduct->seller->seller_stalls->name); ?> </span> - <span class="seller-name"><?php echo e($sellerProduct->seller->user->first_name); ?></span></p>
                    </div>

                    <hr>

                    <div class="details-middle">
                        <h4 class="product-price">Php <?php echo e(number_format($sellerProduct->price, 2)); ?></h4>
                        <br>
                        <br>
                        <p><?php echo e($sellerProduct->description); ?></p>
                    </div>

                    <div class="details-bottom">

                    </div>



                </div>
            </div>

        </div>
    </section>
    <div class="product-bottom-area">

        <div class="comment-area container">


            <h1 class="title"><span>Comments</span></h1>

            <ul>
                <?php $__currentLoopData = $sellerProduct->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php for( $i=1; $i<=$comment->ratings; $i++): ?>
                            <span class="product-rating active fa fa-star" data-rating=""></span>
                        <?php endfor; ?>
                        <p><strong><?php echo e(( ($comment->is_anonymous == 1) ? 'Anonymous' : $comment->buyer->user->first_name)); ?></strong></p>

                        <p><?php echo e($comment->comment); ?></p>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>



            <div class="comment-form-area">
                <?php if(session('user_type') == 'buyer'): ?>

                    
                    <form action="<?php echo e(route('shop.products.post.comment', ['id' => $sellerProduct->id])); ?>" id="post-comment" method="POST">


                        <?php echo csrf_field(); ?>
                        <span class="rating fa fa-star" data-rating="1"></span>
                        <span class="rating fa fa-star" data-rating="2"></span>
                        <span class="rating fa fa-star" data-rating="3"></span>
                        <span class="rating fa fa-star" data-rating="4"></span>
                        <span class="rating fa fa-star" data-rating="5"></span>
                        <input type="hidden" name="ratings" value="0">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="comment" cols="120" rows="10"> </textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check-inline   ">
                                <input type="checkbox" class="form-check-input" name="anonymous" value="1" checked>
                                <label for="" class="form-check-label" > Post as Anonymous</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-orange">Submit</button>
                    </form>
                <?php endif; ?>
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

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/products/find.blade.php ENDPATH**/ ?>