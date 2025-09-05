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

                    <div class="basic-info-body">


                    </div>

                    <form action="<?php echo e(route('seller.stalls.update', ['id' =>  $seller_stall->id])); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group" style="display: flex; flex-flow:  row wrap">
                            <div class="info-item">
                                <label for="">Stall</label>
                                <select name="number" id="number" class="form-control <?php if ($errors->has('number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('number'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" readonly="">
                                    <option value="<?php echo e($seller_stall->stall->id); ?>" selected> Stall No. <?php echo e($seller_stall->stall->number); ?></option>
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

                            <div class="info-item">
                                <label for="">Stall Name</label>
                                <input type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="<?php echo e($seller_stall->name); ?>">

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

                            <?php if($seller_stall->stall->market_id == 3): ?>

                                <div class="info-item">
                                    <label for="">Annual Fee</label>
                                    <input type="text" class="form-control <?php if ($errors->has('annual_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('annual_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="annual_fee" id="annual_fee" value="<?php echo e($seller_stall->stall->annual_fee); ?>" readonly>

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
                            <?php else: ?>
                                <div class="info-item">
                                    <label for="">Rental Fee</label>
                                    <input type="text" class="form-control <?php if ($errors->has('rental_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rental_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="rental_fee" id="rental_fee" readonly>

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
                            <?php endif; ?>

                            <div class="info-item short">
                                <label for="">Start Date</label>


                                <input type="date" class="form-control <?php if ($errors->has('start_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('start_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="start_date" id="start_date" value="<?php echo e($seller_stall->start_date->format('Y-m-d')); ?>" readonly>

                                <?php if ($errors->has('start_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('start_date'); ?>
                                <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            <div class="info-item short">
                                <label for="">End Date</label>
                                <input type="date" class="form-control <?php if ($errors->has('end_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('end_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="end_date" id="end_date" value="<?php echo e($seller_stall->end_date->format('Y-m-d')); ?>" readonly>

                                <?php if ($errors->has('end_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('end_date'); ?>
                                <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="info-item">
                                <label for="">Duration (Months)</label>
                                <input type="text" class="form-control <?php if ($errors->has('duration')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duration'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="duration" id="duration" readonly>

                                <?php if ($errors->has('duration')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duration'); ?>
                                <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                            <div class="info-item">
                                <label for="">Contract Lease (PDF Format)</label>
                                <input type="file" class="form-control <?php if ($errors->has('contract_of_lease')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contract_of_lease'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contract_of_lease" id="contract_of_lease">

                                <?php if ($errors->has('contract_of_lease')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contract_of_lease'); ?>
                                <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>


                            <!-- <div class="info-item" id="image-container">
                                <label for="">Image</label>
                                <input type="file" name="image[]" id="stall-mage" class="form-control form-control-file" >


                            </div> -->
                           



                            <button type="submit"  class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const products = {
            init: function(  ){
                products.initStallDetails($('#stall'));
                products.initDuration( $('input[type="date"]'));

            },
            initStallDetails: function( trigger ){
                trigger.change(function () {
                    var options = '';

                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url:'<?php echo e(route('seller.display.details')); ?>',
                        data: {
                            id: this.value,
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {

                            $('#rental_fee').val(data.rental_fee);

                        }
                    });
                })
            },

            initStallDetailsOnLoad: function(  ){

                    var options = '';

                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url:'<?php echo e(route('seller.display.details')); ?>',
                        data: {
                            id: $('#number').val(),
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success:function(data) {

                            $('#rental_fee').val(data.rental_fee);

                        }
                    });

            },


            initDuration: function( trigger ){


                trigger.change(function () {
                    let date_1 = new Date($('#end_date').val());
                    let date_2 = new Date($('#start_date').val());

                    // let difference = date_1.getTime() - date_2.getTime();
                    // let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
                    // $('#duration').val(TotalDays);


                    var months;
                    var result;
                    months = (date_1.getFullYear() - date_2.getFullYear()) * 12;
                    months -= date_2.getMonth();
                    months += date_1.getMonth();

                    result = months <= 0  ? 0 : months;
                    $('#duration').val(result);

                });
            },
            initDurationOnLoad: function(  ){


                    let date_1 = new Date($('#end_date').val());
                    let date_2 = new Date($('#start_date').val());

                    // let difference = date_1.getTime() - date_2.getTime();
                    // let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
                    // $('#duration').val(TotalDays);


                    var months;
                    var result;
                    months = (date_1.getFullYear() - date_2.getFullYear()) * 12;
                    months -= date_2.getMonth();
                    months += date_1.getMonth();

                    result = months <= 0  ? 0 : months;
                    $('#duration').val(result);

            },
            initPreviewSlick: function () {
                $('#slide-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '#slide-nav'
                });

                $('#slide-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
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

            addImage: function (trigger) {
                trigger.click(function () {

                    var self = $('#stall-image');
                    var clonedItem = self.clone();

                    /*clonedItem.find('button').attr('data-action', 'removeVideoURL');
                    clonedItem.find('button').find('.plus-icon').removeClass('plus-icon');
                    clonedItem.find('button').find('div').addClass('fa fa-trash');*/
                    clonedItem.appendTo('#image-container');
                    // $('button[data-action="removeVideo"]').prop('disabled', false);



                })
            },
        };

        $(document).ready(function(){
            products.initDurationOnLoad();
            products.initStallDetailsOnLoad();
            products.addImage($('#addImage'));

        });
        $(window).on('load', function(){
            products.init();
            products.initPreviewSlick();


        });

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/stalls/edit.blade.php ENDPATH**/ ?>