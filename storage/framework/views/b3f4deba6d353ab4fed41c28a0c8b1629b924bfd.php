<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Product Information
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" class="form-">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">


                                <div class="form-group long">
                                    <label for="email">Product Categories</label>
                                    <select  class="form-control <?php if ($errors->has('category')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                            id="category" 
                                            name="category" 
                                            placeholder="Category">
                                            <option value=""><?php echo e('Category'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->category); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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
                                    <label for="Product">Product</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                                        id="product" 
                                                        name="product" 
                                                        placeholder="i.e. Apple" value="" >

                                    </select>
                                    <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>
                                <div class="form-group long">
                                    <label for="min_price">Minimum Price</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('min_price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('min_price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                                        id="min_price" 
                                                        name="min_price" 
                                                        placeholder="i.e. 12" value="" >

                                    </select>
                                    <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <label for="max_price">Maximum Price</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('max_price')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('max_price'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                                        id="max_price" 
                                                        name="max_price" 
                                                        placeholder="i.e. 15" value="" >

                                    </select>
                                    <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <label for="srp">SRP</label>
                                    <input type="text"  class="form-control <?php if ($errors->has('srp')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('srp'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                                        id="srp" 
                                                        name="srp" 
                                                        placeholder="i.e. 12" value="" >

                                    </select>
                                    <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group long">
                                    <label for="type">Type</label>
                                    <select  class="form-control" id="type" name="type" placeholder=""  >
                                        <option value="Wholesale">Wholesale</option>
                                        <option value="Retail">Retail</option>
                                    </select>

                                    <?php if ($errors->has('product')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('product'); ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/products/create.blade.php ENDPATH**/ ?>