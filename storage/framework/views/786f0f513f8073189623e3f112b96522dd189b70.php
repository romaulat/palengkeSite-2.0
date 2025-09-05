<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Developer
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.developers.store')); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">


                                <div class="form-group long">

                                </div>
                                <div class="form-group long">
                                    <label for="Product">Name</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        id="name"
                                                        name="name"
                                                        placeholder="" value="" >

                                    </select>
                                    <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>
                                <div class="form-group long">
                                    <label for="facebook">Facebook</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('facebook')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('facebook'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        id="facebook"
                                                        name="facebook"
                                                        placeholder="" value="" >

                                    </select>
                                    <?php if ($errors->has('facebook')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('facebook'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <label for="twitter">Twitter</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('twitter')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('twitter'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        id="twitter"
                                                        name="twitter"
                                                        placeholder="" value="" >

                                    </select>
                                    <?php if ($errors->has('twitter')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('twitter'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <label for="srp">Instagram</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('instagram')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('instagram'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        id="instagram"
                                                        name="instagram"
                                                        placeholder="" value="" >

                                    </select>
                                    <?php if ($errors->has('instagram')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('instagram'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                            <div class="form-group long">
                                <label for="srp">Linked In</label>
                                <input type="text"  class="form-control <?php if ($errors->has('linkedin')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('linkedin'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="linkedin"
                                       name="linkedin"
                                       placeholder="" value="" >

                                <?php if ($errors->has('linkedin')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('linkedin'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            <div class="form-group long">
                                <label for="photo">Photo</label>
                                <input type="file"  class="form-control <?php if ($errors->has('photo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('photo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="profile_image"
                                       name="photo"
                                       placeholder="" value="" >
                                <img src="" alt="" id="profileImg" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('photo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('photo'); ?>
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
<script>

    const doc = $(document);
    const dev = {
        onInit: function(){
            dev.previewProfileImage($('#profile_image'));
        },

        previewProfileImage: function (trigger) {
            trigger.change(function () {
                const file = $(this).get(0).files[0];
                const image = $('#profileImg');
                if (file) {
                    var reader = new FileReader();

                    reader.onload = function(){
                        image.attr("src", reader.result);
                    };

                    reader.readAsDataURL(file);

                }
            });
        },
    }

    doc.ready(function () {
        dev.onInit();
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/about-us/create.blade.php ENDPATH**/ ?>