<?php $__env->startSection('content'); ?>




    <div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Stall Information
                </div>
                <div class="basic-info-body">

                    <?php if(isset($message)): ?>
                        <strong><?php echo e($message); ?></strong>
                    <?php endif; ?>

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

                        <div class="basic-info-body">
                            <div class="info-body-flex">
                                <div class="info-item short">
                                    <h3>Stall No: <?php echo e($stall->number); ?></h3>
                                </div>

                                <div class="info-item short">
                                    <h3>Status: <?php echo e($stall->status); ?></h3>
                                </div>
                            </div>

                            <div class="stall">
                                <div class="stall-info">
                                    <div class="stall-gallery-container">
                                        <div id="slide-for">
                                            <div>
                                                <div class="stall-main-img">
                                                    <img src="<?php echo e(asset($stall->image)); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <?php $imagekey = 'image_'.$i; ?>
                                                <?php if($stall[$imagekey]): ?>
                                                    <div>
                                                        <div class="stall-img">
                                                            <img src="<?php echo e(asset($stall[$imagekey])); ?>" alt="">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <div id="slide-nav" class="stall-gallery">
                                            <div>
                                                <div class="stall-img">
                                                    <img src="<?php echo e(asset($stall->image)); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php for($i=1; $i<=5; $i++): ?>

                                                <?php $imagekey = 'image_'.$i; ?>
                                                <?php if($stall[$imagekey]): ?>
                                                    <div>
                                                        <div class="stall-img">
                                                            <img src="<?php echo e(asset($stall[$imagekey])); ?>" alt="">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <div class="stall-info-container">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><p><strong>Section:</strong></p> </td>
                                                <td> <p><?php echo e($stall->section); ?></p></td>
                                            </tr>
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Area: </strong></p></td>
                                                <td> <p><?php echo e($stall->sqm); ?> sqm</p></td>
                                            </tr>
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Amount / Sqm: </strong> </p> </td>
                                                <td> <p>Php <?php echo e($stall->amount_sqm); ?></p></td>
                                            </tr>

                                            <?php if($stall->market_id == 3): ?>
                                                <td class="stall-info-title-container"><p><strong>Annual Fee: </strong></p> </td>
                                                <td> <p><?php echo e($stall->annual_fee); ?></p></td>   
                                            <?php else: ?>
                                                <td class="stall-info-title-container"><p><strong>Rental Fee: </strong></p> </td>
                                                <td> <p><?php echo e($stall->rental_fee); ?></p></td>
                                            <?php endif; ?>
                                            
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Coordinates: </strong></p> </td>
                                                <td> <p><?php echo e($stall->coords); ?></p></td>
                                            </tr>
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Meter Number: </strong></p> </td>
                                                <td> <p><?php echo e($stall->meter_num); ?></p></td>
                                            </tr>
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Location: </strong></p> </td>
                                                <td> <p><?php echo e($stall->market->market); ?></p></td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>

                            </div>


                        </div>

                        <?php if(isset($message)): ?>
                            <?php echo e($message); ?>

                        <?php endif; ?>
                        <form action="<?php echo e(route('seller.stalls.store')); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            
                        <div class="info-body-flex justify-content-center">

                                <div class="form-group medium">
                                    <label for="start_date">Appointment Date</label>
                                    <input type="date"
                                           class="form-control <?php if ($errors->has('appointment_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('appointment_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="appointment_date"
                                           name="appointment_date"
                                           placeholder="Appointment Date"
                                           min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>"
                                           value="<?php echo e(old('appointment_date')); ?>" >
                                    <input type="hidden" name="stall_id" value="<?php echo e($stall->id); ?>">

                                    <?php if ($errors->has('date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('date'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>

                                <br>

                                <div class="form-group medium">
                                    <h3 style="text-align: center;">Upload the following (JPG, JPEG, or PNG): </h3>
                                    <label for="application_letter">Application Letter Under Oath</label>
                                    <input type="file"
                                           enc
                                           class="form-control <?php if ($errors->has('application_letter')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('application_letter'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="application_letter"
                                           name="application_letter"
                                           placeholder=""
                                           value="" >

                                    <?php if ($errors->has('application_letter')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('application_letter'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>

                                <!-- <div class="form-group medium">
                                    <label for="residency">Bonifide Resident of Mabini, Batangas</label>
                                    <input type="file"
                                           class="form-control <?php if ($errors->has('residency')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('residency'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="residency"
                                           name="residency"
                                           placeholder=""
                                           value="" >

                                    <?php if ($errors->has('residency')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('residency'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div> -->

                                <div class="form-group medium">
                                    <label for="image">2 X 2 picture</label>
                                    <input type="file"
                                           class="form-control <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="image"
                                           name="image"
                                           placeholder=""
                                           value="" >

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

                                <div class="form-group medium">
                                    <label for="id">2 Valid IDs</label>
                                    <input type="file"
                                           class="form-control <?php if ($errors->has('id1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('id1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="id1"
                                           name="id1"
                                           placeholder=""
                                           value="" >
                                    
                                    <?php if ($errors->has('id1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('id1'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>

                                <div class="form-group medium">
                                    <input type="file"
                                           class="form-control <?php if ($errors->has('id2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('id2'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                           id="id2"
                                           name="id2"
                                           placeholder=""
                                           value="" >

                                    <?php if ($errors->has('id2')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('id2'); ?>
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
                                    <?php echo e(__('Apply')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const uploadElements = document.querySelectorAll('input[type="file"]');

        uploadElements.forEach((element) => {
            element.addEventListener('change', (event) => {
                const file = event.target.files[0];
                const allowedExtensions = ['png', 'jpg', 'jpeg'];

                if (file) {
                const fileExtension = file.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(fileExtension)) {
                    alert('Invalid file format. Please upload a PNG, JPG, or JPEG file.');
                    event.target.value = ''; // Clear the file input
                }
                }
            });
        });

        const products = {
            init: function(  ){
                products.initCategories($('#category'));
            },
            initCategories: function( trigger ){
                trigger.change(function () {
                    var options = '';
                    console.log(this.value);
                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url:'<?php echo e(route('seller.products.find.category')); ?>',
                        data: {
                            id: this.value,
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {


                            for( i = 0; i < data.length; i++){

                                options += '<option value="'+ data[i].id +'">' + data[i].product_name + '</option>';

                            }

                            $('#product').html(options);
                        }
                    });
                })
            },
            initDuration: function( trigger ){
                trigger.change(function () {
                    let date_1 = new Date($('#start_date').val());
                    let date_2 = new Date($('#end_date').val());

                    let difference = date_1.getTime() - date_2.getTime();
                    console.log(difference);
                });
            },
            initPreviewSlick: function () {
                $('#slide-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    arrows: false,
                    fade: true,
                    asNavFor: '#slide-nav'
                });

                $('#slide-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    asNavFor: '#slide-for',
                    dots: false ,
                    centerMode: true,
                    focusOnSelect: true
                });
            },

            initDisableWeekends: function(){
                const picker = document.getElementById('appointment_date');
                    picker.addEventListener('input', function(e){
                        var day = new Date(this.value).getUTCDay();
                        if([6,0].includes(day)){
                            e.preventDefault();
                            this.value = '';
                            alert('Weekends not allowed');
                        }
                    });
            },
            

        };

        $(window).on('load', function(){
            products.init();
            
            products.initPreviewSlick();

            products.initDisableWeekends();

            products.initDuration($('input[type="date"]'));
        });

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/stalls/create.blade.php ENDPATH**/ ?>