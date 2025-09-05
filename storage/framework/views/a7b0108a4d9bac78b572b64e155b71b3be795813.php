<?php $__env->startSection('content'); ?>

<section class="about-us">
    <div class="container">
        <div class="about-title">
            <p>Behind the websbite</p>
            <h1>Get to know
                <span>us more</span>
            </h1>
        </div>
        <div class="about-us-flex">
            <div class="about-us-left reveal">
                <img src="<?php echo e($about->image ?? \Illuminate\Support\Facades\URL::to('/images/about.png')); ?>" alt="">
            </div>
            <div class="about-us-right reveal">
                <h3><?php echo e($about->title ?? 'WHY CHOOSE US?'); ?></h3>

                <?php if(isset($about->description)): ?>
                    <p><?php echo e($about->description); ?></p>
                <?php else: ?>
                <p>
                    PalengkeSite is an e-commerce website for Batangueñoes.
                    Categories including meat, fish, fruits, vegetables, and grocery items are available here.
                    It aims to ease up buying essential goods in a convenient and effective system.
                </p>
                <p>
                    PalengkeSite can produce a big impact to the community because it can give customers easy access to buy
                    their groceries and their needs in the market online and can help sellers to recover from financial loss
                </p>
                <?php endif; ?>
                <a href="<?php echo e($about->url ?? route('contact-us')); ?>" class="pal-button btn-orange"><?php echo e($about->label ?? 'Contact Us'); ?></a>
            </div>
        </div>

    </div>
</section>
<section class="about-developers">
    <div class="container reveal">
        <h3>Developers</h3>
        <div class="developers-grid">

            <?php $__currentLoopData = $developers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $developer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="developer">
                <div class="img-section">
                    <img src="<?php echo e(asset($developer->photo) ?? \Illuminate\Support\Facades\URL::to('/images/logo-palengkesite.png')); ?>" alt="">
                    <ul>
                        <li><a target="_blank" href="<?php echo e($developer->facebook ?? '#'); ?>"><span class="fab fa-facebook-f"></span></a></li>
                        <li><a target="_blank" href="<?php echo e($developer->twitter ?? '#'); ?>"><span class="fab fa-twitter"></span></a></li>
                        <li><a target="_blank" href="<?php echo e($developer->instagram ?? '#'); ?>"><span class="fab fa-instagram"></span></a></li>
                        <li><a target="_blank" href="<?php echo e($developer->linkedin ?? '#'); ?>"><span class="fab fa-linkedin"></span></a></li>

                    </ul>
                </div>
                <div class="name-section">
                    <p><?php echo e($developer->name); ?></p>
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
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/about-us.blade.php ENDPATH**/ ?>