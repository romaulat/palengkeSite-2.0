<?php $__env->startSection('content'); ?>




    <div class="profile">
        <div class="profile-wrapper">

                <div class="basic-info-body">

                    <?php if(session('message')): ?>
                        <H3 class="alert alert-success"><?php echo e(session('message')); ?></H3>
                    <?php endif; ?>


                    <div class="basic-info-body">
                        <div class="stall">
                            <div class="stall-info">
                                <div class="stall-gallery-container">

                                    <?php if($seller_stall->seller_stall_images()->exists()): ?>

                                        <div id="slide-for">
                                            <?php $__currentLoopData = $seller_stall->seller_stall_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <div class="stall-img">
                                                            <img src="<?php echo e(asset( $image->image )); ?>" alt="">
                                                        </div>
                                                    </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div id="slide-nav" class="">
                                           <?php $__currentLoopData = $seller_stall->seller_stall_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <div class="stall-img">
                                                        <img src="<?php echo e(asset($image->image)); ?>" alt="">
                                                    </div>
                                                </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <div id="slide-for">
                                            <div>
                                                <div class="stall-main-img">
                                                    <img src="<?php echo e(asset($seller_stall->stall->image)); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <?php $imagekey = 'image_'.$i; ?>
                                                <?php if($seller_stall->stall[$imagekey]): ?>
                                                    <div>
                                                        <div class="stall-img">
                                                            <img src="<?php echo e(asset($seller_stall->stall[$imagekey])); ?>" alt="">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                        <div id="slide-nav" class="">
                                            <div>
                                                <div class="stall-img">
                                                    <img src="<?php echo e(asset($seller_stall->stall->image)); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <?php $imagekey = 'image_'.$i; ?>
                                                <?php if($seller_stall->stall[$imagekey]): ?>
                                                    <div>
                                                        <div class="stall-img">
                                                            <img src="<?php echo e(asset($seller_stall->stall[$imagekey])); ?>" alt="">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <div class="stall-info-container">
                                    <div class="info-body-flex">
                                        <div class="info-item short">
                                            <h3>Stall No: <?php echo e($seller_stall->stall->number); ?></h3>

                                            <?php if($seller_stall->status == 'active'): ?>
                                                <a href="<?php echo e(route('seller.stalls.edit', ['id' => $seller_stall->id])); ?>" class=""><span class="fa fa-edit"></span> Edit</a>
                                            <?php endif; ?>
                                        </div>

                                        <div class="info-item short">
                                            <h3>Status: <?php echo e($seller_stall->stall->status); ?></h3>
                                        </div>
                                    </div>
                                    <?php if($seller_stall->status == 'active'): ?>
                                        <table class="table table-bordered">
                                        <tr>
                                            <td><p><strong>Stall Name:</strong></p> </td>
                                            <?php if($seller_stall->name !== null ): ?>
                                                <td> <p><?php echo e($seller_stall->name); ?></p></td>
                                            <?php else: ?>
                                            <td> <p style="color:red;">No Stall Name Yet</p></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td><p><strong>Section:</strong></p> </td>
                                            <td> <p><?php echo e($seller_stall->stall->section); ?></p></td>
                                        </tr>
                                        <tr>
                                            <td class="stall-info-title-container"><p><strong>Area in sq.m.: </strong></p></td>
                                            <td> <p><?php echo e($seller_stall->stall->sqm); ?> sqm</p></td>
                                        </tr>
                                        <tr>
                                            <td class="stall-info-title-container"><p><strong>Amount per sq.m. / Rate: </strong> </p> </td>
                                            <td> <p>₱<?php echo e($seller_stall->stall->amount_sqm); ?></p></td>
                                        </tr>
                                        <tr>
                                            <td class="stall-info-title-container"><p><strong>Coordinates: </strong> </p> </td>
                                            <td> <p><?php echo e($seller_stall->stall->coords); ?></p></td>
                                        </tr>
                                        <tr>
                                            <td class="stall-info-title-container"><p><strong>Meter Number: </strong> </p> </td>
                                            <td> <p><?php echo e($seller_stall->stall->meter_num); ?></p></td>
                                        </tr>
                                        <?php if( $seller_stall->stall->market_id == 3): ?>
                                            <td class="stall-info-title-container"><p><strong>Annual Fee: </strong></p> </td>
                                            <td> <p><?php echo e($seller_stall->stall->annual_fee); ?></p></td>   
                                        <?php else: ?>
                                            <td class="stall-info-title-container"><p><strong>Rental Fee Per Day: </strong></p> </td>
                                            <td> <p><?php echo e($seller_stall->stall->rental_fee); ?></p></td>
                                        <?php endif; ?>

                                        <tr>
                                            <td class="stall-info-title-container"><p><strong>Duration: </strong></p> </td>
                                            <td> <p><?php echo e($seller_stall->duration); ?></p></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a href="<?php echo e(asset( $seller_stall->contact_of_lease )); ?>"  target="_blank" class="btn option-btn">
                                                    <span class="fa fa-eye"></span> View Contract
                                                </a>
                                            </td>
                                        </tr>
                                    </table>

                                    <?php elseif($seller_stall->status == 'pending'): ?>
                                        <h3 class="alert alert-warning">Waiting for Approval</h3>

                                    <?php elseif($seller_stall->status == 'inactive'): ?>
                                        <h3 class="alert alert-danger">Please check your contract and contact you admin for renewal.</h3>
                                    <?php endif; ?>


                                    <?php if($seller_stall->stall_appointment): ?>
                                        <h4>Appointment Details</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <th>Date of Appointment</th>
                                                <th>Status</th>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo e($seller_stall->stall_appointment->date); ?></td>
                                                    <td><?php echo e($seller_stall->stall_appointment->status); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>


                                </div>
                            </div>

                        </div>


                    </div>

                    <?php if(  auth()->user()->seller->seller_stalls->status  == 'Pending Approval'): ?>

                        <div class="alert alert-success">
                            <?php echo e(auth()->user()->seller->seller_stalls->status); ?>

                        </div>

                    <?php else: ?>

                    <?php endif; ?>
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
            initPreviewSlick: function () {
                $('#slide-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '#slide-nav'
                });

                $('#slide-nav').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    asNavFor: '#slide-for',
                    dots: false ,
                    arrows: true,
                    prevArrow: '<div class="nav-arrows arrow-left"><i class="fa fa-angle-left"></div>',
                    nextArrow: '<div class="nav-arrows arrow-right"><i class="fa fa-angle-right"></div>',
                    centerMode: true,
                    focusOnSelect: true
                });
            }
        };

        $(window).on('load', function(){
            products.init();
            products.initPreviewSlick();

        });

    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/stalls/show.blade.php ENDPATH**/ ?>