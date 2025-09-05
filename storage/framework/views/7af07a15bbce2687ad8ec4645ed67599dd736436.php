<?php $__env->startSection('content'); ?>
    <section class="contact-us">
        <div class="container">
            <div class = "contact-title">
                <p>If you have any inquiries</p>
                <h1>Contact Us</h1>
            </div>
            <form action="<?php echo e(route('contact-us.submit')); ?>" class="form-group contact-form" method="POST">

                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12 contact-label">
                        <label for="" class="col-form-label">Name</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" id="">
                    </div>

                    <div class="col-md-12 contact-label">
                        <label for="" class="col-form-label">Email</label>
                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" id="">
                    </div>

                    <div class="col-md-12 contact-label">
                        <label for="" class="col-form-label">Subject</label>
                        <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control" id="">
                    </div>

                    <div class="col-md-12 contact-label">
                        <label for="" class="col-form-label">Message</label>
                        <textarea name="message" class="form-control" id="" rows="10" cols="10"><?php echo e(old('message')); ?></textarea>
                    </div>

                    <button class="home-btn option-btn contact-btn">Submit</button>
                </div>

        </form>

        </div>
    </section>


    <script>    
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
                    nextArrow: false,
                    prevArrow: false,
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/home/contact-us.blade.php ENDPATH**/ ?>