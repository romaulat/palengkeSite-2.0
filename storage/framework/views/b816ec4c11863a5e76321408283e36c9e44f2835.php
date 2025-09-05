<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Category Information
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <div class="alert alert-<?php echo e(($success) ? 'success' : 'danger'); ?>"><strong><?php echo e($message); ?></strong></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.categories.update', [$category->id])); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                            <div class="form-group long">
                                <label for="Product">Category</label>
                                <input type="text"  class="form-control <?php if ($errors->has('category')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="category"
                                       name="category"
                                       placeholder="i.e. Apple" value="<?php echo e($category->category); ?>" >
                                <?php if ($errors->has('category')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="Image">Image Upload</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image"
                                       name="image"
                                       placeholder="" value="<?php echo e($category->image); ?>" >
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>