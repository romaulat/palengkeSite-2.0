<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                   Category
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.markets.store')); ?>" method="POST" class="form-">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">



                                <div class="form-group long">
                                    <label for="market">Market</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('market')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('market'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        id="market"
                                                        name="market"
                                                        placeholder="" value="" >
                                    <?php if ($errors->has('market')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('market'); ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/markets/create.blade.php ENDPATH**/ ?>