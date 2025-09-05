<?php $__env->startSection('content'); ?>


    <?php echo e($message ?? ''); ?>


    <div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Seller Information
                </div>
                <div class="basic-info-body">
                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>
                    <form action="<?php echo e(route('seller.store')); ?>" method="POST" class="form-">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                            <?php if(!auth()->user()->seller()->exists()): ?>
                                <div class="form-group info-item ">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control <?php if ($errors->has('birthday')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birthday'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="birthday" name="birthday" placeholder="Birthday" value="<?php echo e(old('birthday')); ?>" >
                                    <?php if ($errors->has('birthday')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('birthday'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group info-item ">
                                    <label for="email">Age</label>
                                    <input type="number" class="form-control <?php if ($errors->has('age')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('age'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="age" name="age" placeholder="Age" value="<?php echo e(old('agen')); ?>" readonly>
                                    <?php if ($errors->has('age')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('age'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group info-item ">
                                    <label for="email">Gender</label>
                                    <select  class="form-control <?php if ($errors->has('gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gender'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="gender" name="gender" placeholder="Gender" value="" >
                                        <option value="Male" <?php echo e(( old('gender') == 'Male')   ? 'selected' : ''); ?>>Male</option>
                                        <option value="Female" <?php echo e(( old('gender') == 'Female')  ? 'selected' : ''); ?>>Female</option>

                                    </select>
                                    <?php if ($errors->has('gender')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('gender'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group info-item short input-group mb-3 prepend">
                                    <label for="contact">Contact Number</label>
                                    <div class="input-group-prepend info-item-prepend">
                                        <span class="input-group-text" id="basic-addon1">+63</span>
                                    </div>
                                    <input type="text" class="form-control <?php if ($errors->has('contact')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="contact" name="contact"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" placeholder="Enter your contact number eg 9123456789" value="">
                                    <?php if ($errors->has('contact')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contact'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                                </div>

                                <div class="form-group info-item ">
                                    <label for="seller_type">Seller Type</label>
                                    <select  class="form-control" id="seller_type" name="seller_type" placeholder="" value="" >
                                        <option value="wholesaler">Wholesaler</option>
                                        <option value="retailer">Retailer</option>
                                    </select>

                                    <?php if ($errors->has('seller_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('seller_type'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                
                                <div class="form-group info-item ">
                                    <label for="market">Market</label>
                                    <!-- <select  class="form-control" id="market_id" name="market_id" placeholder="" value="" >
                                        <option value="1">Poblacion</option>
                                        <option value="2">Anilao</option>
                                        <option value="3">Talaga</option>
                                    </select> -->
                                    <select  class="form-control" id="market_id" name="market_id" placeholder="" value="" >
                                        <?php $__currentLoopData = \App\Market::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($market->id); ?>"><?php echo e($market->market); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            


                            <?php endif; ?>


                            

                        </div>


                        <div class="row-btn">
                            <div class="btn-container" style="padding: 0 10px 15px;">
                                <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                    <?php echo e(__('Save')); ?>

                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        }

        $('#birthday').on('change', function () {

            var age = getAge( $(this).val());
            $('#age').val( age );
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/create.blade.php ENDPATH**/ ?>