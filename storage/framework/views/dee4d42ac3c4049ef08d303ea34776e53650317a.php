<?php $__env->startSection('content'); ?>

    <div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    ABOUT US
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.about-us.store')); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">


                            <div class="form-group long">

                            </div>
                            <div class="form-group long">
                                <label for="photo">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image"
                                       name="image"
                                       placeholder="" value="" >
                                <img src="<?php echo e(($aboutUs) ? $aboutUs->image : ''); ?>" alt="" id="aboutUsImage" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="facebook">Title</label>
                                <input type="text"  class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="title"
                                       name="title"
                                       placeholder="" value="<?php echo e(($aboutUs) ? $aboutUs->title : ''); ?>" >

                                <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="Product">Description</label>
                                <textarea   class="form-control <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="description"
                                       name="description"
                                       placeholder="Description"  cols="10" rows="10"><?php echo e(($aboutUs) ? $aboutUs->description : ''); ?></textarea>
                                <?php if ($errors->has('description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('description'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>


                            <div class="form-group long">
                                <label for="facebook">URL</label>
                                <input type="text"  class="form-control <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="url"
                                       name="url"
                                       placeholder="" value="<?php echo e(($aboutUs) ? $aboutUs->url : ''); ?>" >

                                <?php if ($errors->has('url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('url'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="twitter">Label</label>
                                <input type="text"  class="form-control <?php if ($errors->has('label')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('label'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="label"
                                       name="label"
                                       placeholder="" value="<?php echo e(($aboutUs) ? $aboutUs->label : ''); ?>" >


                                <?php if ($errors->has('label')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('label'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                        </div>
                        <div class="row-btn">
                            <div class="btn-container" style="padding: 0 10px 15px;">
                                <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="about-us">
        <div class="container">
            <div class="about-us-flex">
                <div class="about-us-left reveal active">

                    <?php if($aboutUs): ?>
                        <img src="<?php echo e(asset($aboutUs->image)); ?>" alt="">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/about.png')); ?>" alt="" >
                    <?php endif; ?>
                </div>
                <div class="about-us-right reveal active">

                    <?php if($aboutUs): ?>
                        <h3><?php echo e($aboutUs->title); ?></h3>
                           <p>
                               <?php echo e($aboutUs->description); ?>

                           </p>

                        <a href="<?php echo e($aboutUs->url); ?>" class="pal-button btn-orange"><?php echo e($aboutUs->label); ?></a>
                    <?php else: ?>
                        <h3>WHY CHOOSE US?</h3>
                        <p>
                            PalengkeSite is an e-commerce website for Batangueñoes.
                            Categories including meat, fish, fruits, vegetables, and grocery items are available here.
                            It aims to ease up buying essential goods in a convenient and effective system.

                            PalengkeSite can produce a big impact to the community because it can give customers easy access to buy
                            their groceries and their needs in the market online and can help sellers to recover from financial loss
                        </p>

                        <!-- <a href="https://palengkesite.test/contact-us" class="pal-button btn-orange">Contact Us</a> -->
                    <?php endif; ?>


                </div>
            </div>
        </div>

    </section>


    <script>

        const doc = $(document);
        const dev = {
            onInit: function(){
                dev.previewProfileImage($('#image'));
                dev.previewTitle($('#title'));
                dev.previewDescription($('#description'));
                dev.previewURL($('#url'));
                dev.previewLabel($('#label'));
            },

            previewProfileImage: function (trigger) {
                trigger.change(function () {
                    const file = $(this).get(0).files[0];
                    const image = $('#aboutUsImage');
                    const aboutUsLeft = $('.about-us-left img');
                    if (file) {
                        var reader = new FileReader();

                        reader.onload = function(){
                            image.attr("src", reader.result);
                            aboutUsLeft.attr("src", reader.result);

                        };

                        reader.readAsDataURL(file);

                    }
                });
            },
            previewTitle: function (trigger) {
                trigger.change(function () {
                    var self = $(this);
                    if(self.val() !== '' ){
                        var title = $('.about-us-right h3');

                        title.text(self.val());
                    }
                });
            },
            previewDescription: function (trigger) {
                trigger.change(function () {
                    var self = $(this);
                    if(self.val() !== '' ){
                        var description = $('.about-us-right p');

                        description.text(self.val());
                    }
                });
            },
            previewURL: function (trigger) {
                trigger.change(function () {
                    var self = $(this);
                    if(self.val() !== '' ){
                        var url = $('.about-us-right a');

                        url.attr('href', self.val());
                    }
                });
            },
            previewLabel: function (trigger) {
                trigger.change(function () {
                    var self = $(this);
                    if(self.val() !== '' ){
                        var url = $('.about-us-right a');

                        url.text(self.val());
                    }
                });
            },
        }

        doc.ready(function () {
            dev.onInit();
        })
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/about-us/index.blade.php ENDPATH**/ ?>