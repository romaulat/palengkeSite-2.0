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
                                                <td> <p>₱<?php echo e($stall->amount_sqm); ?></p></td>
                                            </tr>
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Coordinates: </strong> </p> </td>
                                                <td> <p><?php echo e($stall->coords); ?></p></td>
                                            </tr>
                                            <tr>
                                                <td class="stall-info-title-container"><p><strong>Meter Number: </strong> </p> </td>
                                                <td> <p><?php echo e($stall->meter_num); ?></p></td>
                                            </tr>
                                            <?php if($stall->market_id == 3): ?>
                                                <td class="stall-info-title-container"><p><strong>Annual Fee: </strong></p> </td>
                                                <td> <p><?php echo e($stall->annual_fee); ?></p></td>   
                                            <?php else: ?>
                                                <td class="stall-info-title-container"><p><strong>Rental Fee per Day: </strong></p> </td>
                                                <td> <p><?php echo e($stall->rental_fee); ?></p></td>
                                            <?php endif; ?>
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
                        <form action="<?php echo e(route('seller.stalls.store.details')); ?>" method="POST" class="form-" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                            <div class="form-group" style="display: flex; flex-flow:  row wrap">
                               <input type="hidden" name="stall" value="<?php echo e($stall->id); ?>">

                               <div class="info-item">
                                    <label for="">Stall Name</label>
                                    <input type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" id="name" value="" >

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


                                <?php if($stall->market_id == 3): ?>
                                    <div class="info-item">
                                        <label for="">Annual Fee</label>
                                        <input type="text" class="form-control <?php if ($errors->has('annual_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('annual_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="annual_fee" id="annual_fee" value="<?php echo e($stall->annual_fee); ?>" readonly>

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
                                        <label for="">Rental Fee per Day</label>
                                        <input type="text" class="form-control <?php if ($errors->has('rental_fee')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rental_fee'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="rental_fee" id="rental_fee" value="<?php echo e($stall->rental_fee); ?>" readonly>

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
endif; ?>" name="start_date" id="start_date">

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
endif; ?>" name="end_date" id="end_date">

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
                                
                                <div class="row-btn" style="width: 100%;">
                                    <div class="btn-container" style="padding: 0 10px 15px;">
                                        <button type="submit" class="btn btn-primary" style="font-size: 11px; padding: 8px;">
                                            Button
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
                </div>
            </div>
        </div>
    </div>
    <script>
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

            products.initDuration($('input[type="date"]'));
        });

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/stalls/has-create.blade.php ENDPATH**/ ?>