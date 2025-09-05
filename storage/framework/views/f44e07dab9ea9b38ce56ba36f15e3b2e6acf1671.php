<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Stall Information
                </div>
                <div class="basic-info-body">
                    <?php if(($errors->any())): ?>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Reminder!</strong>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                    <form action="<?php echo e(route('admin.stalls.store')); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                            <div class="form-group long">
                                <label for="stall_number">Stall No.</label>
                                <input type="text"  class="form-control <?php if ($errors->has('stall_number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stall_number'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    id="stall_number"
                                                    name ="stall_number"
                                                    placeholder="" value="<?php echo e(old('stall_number')); ?>" >

                            </div>
                            <div class="form-group long">
                                <label for="Sqm">Area in sqm</label>
                                <input type="text"  class="form-control <?php if ($errors->has('sqm')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sqm'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    id="sqm"
                                                    name="sqm"
                                                    placeholder="" value="<?php echo e(old('sqm')); ?>" >



                            </div>

                            <div class="form-group long">
                                <label for="Amount_Sqm">Amount Per Sqm / Rate</label>
                                <input type="text"  class="form-control <?php if ($errors->has('amount_sqm')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('amount_sqm'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    id="amount_sqm"
                                                    name="amount_sqm"
                                                    placeholder="" value="<?php echo e(old('amount_sqm')); ?>" >


                            </div>

                            <div class="form-group long">

                            <label for="Section">Section</label>
                                <select  class="form-control <?php if ($errors->has('section')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('section'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                            id="section" 
                                            name="section" 
                                            placeholder="Section">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->category); ?>" <?php echo e(( old('section') == $category->category)   ? 'selected' : ''); ?>><?php echo e($category->category); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>



                            </div>

                            <div class="form-group long">
                                <label for="coordinates">Coordinates</label>
                                <input type="text"  class="form-control <?php if ($errors->has('coordinates')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('coordinates'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    id="coordinates"
                                                    name="coordinates"
                                                    placeholder="" value="<?php echo e(old('coordinates')); ?>" >

                            </div>

                            <div class="form-group long">
                                <label for="Meter Number">Meter Number (If no meter number, type N/A)</label>
                                <input type="text"  class="form-control <?php if ($errors->has('meter_number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('meter_number'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    id="meter_number"
                                                    name="meter_number"
                                                    placeholder="" value="<?php echo e(old('meter_number')); ?>" >

                            </div>

                            <div class="form-group long">
                            <label for="Market">Market</label>
                                <select  class="form-control <?php if ($errors->has('market')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('market'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                            id="market" 
                                            name="market" 
                                            placeholder="Market">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($market->id); ?>" <?php echo e(( old('market') == $market->id ) ? 'selected' : ''); ?>><?php echo e($market->market); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group long" id="rentalFeeGroup" style="display: none">
                                <label for="Rental_Fee">Rental Fee per Day</label>
                                <input type="text" class="form-control <?php if ($errors->has('rental_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rental_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                    id="rental_fee"
                                    name="rental_fee"
                                    placeholder="" value="<?php echo e(old('rental_fee')); ?>">
                            </div>

                            <div class="form-group long" id="annualFeeGroup" style="display: none">
                                <label for="annual_fee">Annual Fee</label>
                                <input type="text" class="form-control <?php if ($errors->has('annual_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('annual_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                    id="annual_fee"
                                    name="annual_fee"
                                    placeholder="" value="<?php echo e(old('annual_fee')); ?>">
                            </div>

                            <div class="form-group long  stall-image">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image"
                                       name="image"
                                       placeholder="" value="" >

                            </div>

                            <div id="stall_image_1" class="form-group long  stall-image hide">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image_1"
                                       name="image_1"
                                       placeholder="" value="" >

                            </div>

                            <div id="stall_image_2" class="form-group long  stall-image hide">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image_2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image_2"
                                       name="image_2"
                                       placeholder="" value="" >

                            </div>

                            <div id="stall_image_3" class="form-group long  stall-image hide">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image_3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_3'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image_3"
                                       name="image_3"
                                       placeholder="" value="" >

        

                            </div>

                            <div id="stall_image_4" class="form-group long  stall-image hide">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image_4')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_4'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image_4"
                                       name="image_4"
                                       placeholder="" value="" >

        

                            </div>

                            <div id="stall_image_5" class="form-group long  stall-image hide">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image_5')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_5'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image_5"
                                       name="image_5"
                                       placeholder="" value="">

                            </div>



                            <div class="form-group short">
                                <button type="button" id="addImage" class="btn option-btn"><span class="fa fa-plus-circle"> </span> Add Image</button>
                            </div>

                            </select>

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

<script type="text/javascript">
    document.addEventListener('input', function(event) {
        if (event.target.classList.contains('is-invalid')) {
            event.target.classList.remove('is-invalid');
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('is-invalid')) {
            event.target.classList.remove('is-invalid');
        }
    });

    const marketSelect = document.querySelector('#market');
    const rentalFeeGroup = document.querySelector('#rentalFeeGroup');
    const rentalFeeInput = document.querySelector('#rental_fee');
    const annualFeeGroup = document.querySelector('#annualFeeGroup');
    const annualFeeInput = document.querySelector('#annual_fee');

    marketSelect.addEventListener('change', () => {
        const selectedMarketId = marketSelect.value;

        if (selectedMarketId === '3') {
        rentalFeeInput.value = 'N/A';
        // rentalFeeInput.disabled = true;

        annualFeeInput.value = '';
        annualFeeInput.disabled = false;

        rentalFeeGroup.style.display = 'none';
        annualFeeGroup.style.display = 'block';
        } else {
        rentalFeeInput.value = '';
        rentalFeeInput.disabled = false;

        annualFeeInput.value = 'N/A';
        // annualFeeInput.disabled = true;

        rentalFeeGroup.style.display = 'block';
        annualFeeGroup.style.display = 'none';
        }
    });
    var stall = {
        init: function () {
            this.addImage($('#addImage'));
        },

        addImage: function (trigger) {
            trigger.click(function () {

                var counter  = $('.stall-image').not('.hide').length;

                console.log(counter);

                $('#stall_image_' + counter).removeClass('hide');


               /* var counter = $('.stall-image').length;

                if(counter <= 5){

                    var clone = $('.stall-image:last').clone().insertAfter('.stall-image:last');
                    clone.find('input[type="file"]').attr('name', 'image_' + parseInt(parseInt(counter - 1) + 1));
                }else{

                }*/

            })
        }
    };

    $(window).on('load', function(){
        stall.init();
    })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/stalls/create.blade.php ENDPATH**/ ?>