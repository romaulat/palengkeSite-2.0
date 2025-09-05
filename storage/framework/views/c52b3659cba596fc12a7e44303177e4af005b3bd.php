<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Stall Information
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <div class="alert alert-<?php echo e(($success) ? 'success' : 'danger'); ?>"><strong><?php echo e($message); ?></strong></div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('admin.stalls.update', [$stalls->id])); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                            <div class="form-group long">
                                <label for="Number">Stall No.</label>
                                <input type="text"  class="form-control <?php if ($errors->has('number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('number'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="number"
                                       name ="number"
                                       placeholder="" value="<?php echo e($stalls->number); ?>" >

                                </select>
                                <?php if ($errors->has('number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('number'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            <div class="form-group long">
                                <label for="Sqm">Sqm</label>
                                <input type="text"  class="form-control <?php if ($errors->has('sqm')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sqm'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="sqm"
                                       name="sqm"
                                       placeholder="" value="<?php echo e($stalls->sqm); ?>" >

                                </select>
                                <?php if ($errors->has('sqm')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sqm'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="Amount_Sqm">Amount/Sqm or Rate</label>
                                <input type="text"  class="form-control <?php if ($errors->has('amount_sqm')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('amount_sqm'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="amount_sqm"
                                       name="amount_sqm"
                                       placeholder="" value="<?php echo e($stalls->amount_sqm); ?>" >

                                </select>
                                <?php if ($errors->has('amount_sqm')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('amount_sqm'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="Section">Section</label>
                                <select   class="form-control <?php if ($errors->has('section')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('section'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="market"
                                         name="section">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->category); ?>" <?php echo e(($stalls->section == $category->category) ? 'selected' : ''); ?>>
                                            <?php echo e($category->category); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if ($errors->has('section')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('section'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>
                            
                            <div class="form-group long">
                                <label for="Coordinates">Coordinates</label>
                                <input type="text"  class="form-control <?php if ($errors->has('coords')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('coords'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="coords"
                                       name="coords"
                                       placeholder="" value="<?php echo e($stalls->coords); ?>" >
                                
                                </select>
                                <?php if ($errors->has('coords')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('coords'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            
                            </div>
                            
                            <div class="form-group long">
                                <label for="Meter Number">Meter Number</label>
                                <input type="text"  class="form-control <?php if ($errors->has('meter_num')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('meter_num'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="meter_num"
                                       name="meter_num"
                                       placeholder="" value="<?php echo e($stalls->meter_num); ?>" >
                            
                                </select>
                                <?php if ($errors->has('meter_num')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('meter_num'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            
                            </div>
                            
                            <div class="form-group long">
                                <label for="Market">Market</label>
                                <select   class="form-control <?php if ($errors->has('market')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('market'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" id="market"
                                         name="market">
                                    <?php $__currentLoopData = $markets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $market): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($market->id); ?>" <?php echo e(($stalls->market->id == $market->id) ? 'selected' : ''); ?>>
                                            <?php echo e($market->market); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

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

                            <div class="form-group long">
                                <label for="Rental_Fee">Rental Fee</label>
                                <input type="text"  class="form-control <?php if ($errors->has('rental_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rental_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="rental_fee"
                                       name="rental_fee"
                                       placeholder="" value="<?php echo e($stalls->rental_fee); ?>" >

                                </select>
                                <?php if ($errors->has('rental_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rental_fee'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group long">
                                <label for="annual_fee">Annual Fee</label>
                                <input type="text"  class="form-control <?php if ($errors->has('annual_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('annual_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="annual_fee"
                                       name="annual_fee"
                                       placeholder="" value="<?php echo e($stalls->annual_fee); ?>" >

                                </select>
                                <?php if ($errors->has('annual_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('annual_fee'); ?>
                                <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

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
                                       placeholder="" value="<?php echo e($stalls->image); ?>" >

                                    <img src="<?php echo e(asset($stalls->image)); ?>" alt="" id="imagePreview" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
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

                            <div id="stall_image_1" class="form-group long  stall-image hide">
                                <label for="image">Image</label>
                                <input type="file"  class="form-control <?php if ($errors->has('image_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="image_1"
                                       name="image_1"
                                       placeholder="" value="<?php echo e($stalls->image_1); ?>" >

                                <img src="<?php echo e(asset($stalls->image_1)); ?>" alt="" id="imagePreview" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('image_1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_1'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

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
                                       placeholder="" value="<?php echo e($stalls->image_2); ?>" >
                                
                                <img src="<?php echo e(asset($stalls->image_2)); ?>" alt="" id="imagePreview" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('image_2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_2'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

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
                                       placeholder="" value="<?php echo e($stalls->image_3); ?>" >

                                <img src="<?php echo e(asset($stalls->image_3)); ?>" alt="" id="imagePreview" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('image_3')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_3'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

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
                                       placeholder="" value="<?php echo e($stalls->image_4); ?>" >

                                <img src="<?php echo e(asset($stalls->image_4)); ?>" alt="" id="imagePreview" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('image_4')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_4'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

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
                                       placeholder="" value="<?php echo e($stalls->image_5); ?>" >

                                <img src="<?php echo e(asset($stalls->image_5)); ?>" alt="" id="imagePreview" style="margin-top: 25px; width: 320px; height: 320px; object-fit: cover">
                                <?php if ($errors->has('image_5')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image_5'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            </div>

                            <div class="form-group short">
                                <button type="button" id="addImage" class="btn option-btn"><span class="fa fa-plus-circle"> </span> Add Image</button>
                            </div>

                            </select>
                            <?php if ($errors->has('status')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('status'); ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                            <div class="form-group long">
                                <label for="status">Status</label>
                                <input type="text"  class="form-control <?php if ($errors->has('status')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('status'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                       id="status"
                                       name="status"
                                       placeholder="" value="<?php echo e($stalls->status); ?>" >

                                </select>
                                <?php if ($errors->has('status')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('status'); ?>
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
    <script type="text/javascript">



        var stall = {
        init: function () {
            this.addImage($('#addImage'));
            this.previewImage($('input[type="file"]'));

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
        },

        previewImage: function (trigger) {
            trigger.change(function (event) {
                let self = $(this);
                // Get the selected file
                const file = event.target.files[0];

                // Create a new FileReader object
                const reader = new FileReader();

                // Listen for the FileReader to load the file
                reader.addEventListener('load', (event) => {
                    // Update the image preview source with the loaded file data
                    const imagePreview = self.closest('.stall-image').find('#imagePreview');
                    imagePreview.attr('src', event.target.result);
                });

                // Read the selected file as a data URL
                reader.readAsDataURL(file);

            });

        }
    };

    $(window).on('load', function(){
        stall.init();
    })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/stalls/edit.blade.php ENDPATH**/ ?>