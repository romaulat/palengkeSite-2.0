<?php $__env->startSection('content'); ?>
    <div class="profile">
       <div class="profile-wrapper">
           <div class="card basic-info" style="width: 18rem;">
               <div class="card-header basic-info-header">
                   User Information
               </div>
                <div class="basic-info-body">
                    <div class="info-body-flex">
                        <div class="form-group info-item short">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name"  placeholder="First Name" value="<?php echo e($user->first_name); ?>" readonly>
                        </div>
                        <div class="form-group info-item short">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name"  placeholder="Last Name" value=" <?php echo e($user->last_name); ?>" readonly>
                        </div>

                        <div class="form-group info-item short">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"  placeholder="Email" value=" <?php echo e($user->email); ?>" readonly>
                        </div>

                        <div class="form-group info-item short prepend">
                            <label for="mobile">Mobile</label>
                            <div class="input-group-prepend info-item-prepend">
                                <span class="input-group-text" id="basic-addon1">+63</span>
                            </div>
                            <input type="text" class="form-control" id="mobile"  placeholder="Mobile" value=" <?php echo e($user->mobile); ?>" readonly>
                        </div>


                        <?php if($user->seller()->exists()): ?>
                            <div class="form-group info-item short">
                                <label for="email">Birthday</label>
                                <input type="text" class="form-control" id="birthday"  placeholder="Birthday" value="<?php echo e(date('m/d/Y', strtotime($user->seller->birthday))); ?>" readonly>
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="email">Age</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e($user->seller->age); ?>" readonly>
                            </div>

                            <div class="form-group info-item xshort">
                                <label for="email">Gender</label>
                                <input type="text" class="form-control" id="age"  placeholder="Age" value="<?php echo e($user->seller->gender); ?>" readonly>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
           </div>
       </div>
    </div>

    <?php if($user->seller()->exists()): ?> 
      <?php if($user->seller->seller_stalls()->exists()): ?>
      <div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    Stall Information
                </div>

                      <div class="basic-info-body">


                          <div class="stall">
                              <div class="stall-info">
                                  <div class="stall-gallery-container">
                                      <div id="slide-for">
                                          <div>
                                              <div class="stall-main-img">
                                                  <img src="<?php echo e(asset($user->seller->seller_stalls->stall->image)); ?>" alt="">
                                              </div>
                                          </div>
                                          <?php for($i=1; $i<=5; $i++): ?>
                                              <?php $imagekey = 'image_'.$i; ?>
                                              <?php if($user->seller->seller_stalls->stall[$imagekey]): ?>
                                                  <div>
                                                      <div class="stall-img">
                                                          <img src="<?php echo e(asset($user->seller->seller_stalls->stall[$imagekey])); ?>" alt="">
                                                      </div>
                                                  </div>
                                              <?php endif; ?>
                                          <?php endfor; ?>
                                      </div>
                                      <div id="slide-nav" class="">
                                          <div>
                                              <div class="stall-img">
                                                  <img src="<?php echo e(asset($user->seller->seller_stalls->stall->image)); ?>" alt="">
                                              </div>
                                          </div>
                                          <?php for($i=1; $i<=5; $i++): ?>
                                              <?php $imagekey = 'image_'.$i; ?>
                                              <?php if($user->seller->seller_stalls->stall[$imagekey]): ?>
                                                  <div>
                                                      <div class="stall-img">
                                                          <img src="<?php echo e(asset($user->seller->seller_stalls->stall[$imagekey])); ?>" alt="">
                                                      </div>
                                                  </div>
                                              <?php endif; ?>
                                          <?php endfor; ?>
                                      </div>
                                  </div>
                                  <div class="stall-info-container">
                                      <div class="info-body-flex">
                                          <div class="info-item short">
                                              <h3>Stall No: <?php echo e($user->seller->seller_stalls->stall->number); ?></h3>
                                          </div>

                                          <div class="info-item short">
                                              <h3>Status: <?php echo e($user->seller->seller_stalls->stall->status); ?></h3>
                                          </div>
                                      </div>
                                      <?php if($user->seller->seller_stalls->status == 'active'): ?>
                                      <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <th></th>
                                                <th></th>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td><p><strong>Section:</strong></p> </td>
                                                    <td> <p><?php echo e($user->seller->seller_stalls->stall->section); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>Area: </strong></p></td>
                                                    <td> <p><?php echo e($user->seller->seller_stalls->stall->sqm); ?> sqm</p></td>
                                                </tr>
                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>Amount per sqm / rate: </strong> </p> </td>
                                                    <td> <p>Php <?php echo e($user->seller->seller_stalls->stall->amount_sqm); ?></p></td>
                                                </tr>

                                                <?php if($user->seller->seller_stalls->stall->market_id == 3): ?>
                                                    <tr>
                                                        <td class="stall-info-title-container"><p><strong>Annual Fee: </strong></p> </td>
                                                        <td> <p><?php echo e($user->seller->seller_stalls->stall->annual_fee); ?></p></td>
                                                    </tr>
                                                <?php else: ?>
                                                    <tr>
                                                        <td class="stall-info-title-container"><p><strong>Rental Fee per Day: </strong></p> </td>
                                                        <td> <p><?php echo e($user->seller->seller_stalls->stall->rental_fee); ?></p></td>
                                                    </tr>
                                                <?php endif; ?>


                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>Coordinates: </strong></p> </td>
                                                    <td> <p><?php echo e($user->seller->seller_stalls->stall->coords); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>Meter Number: </strong></p> </td>
                                                    <td> <p><?php echo e($user->seller->seller_stalls->stall->meter_num); ?></p></td>
                                                </tr>

                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>Start Date: </strong></p> </td>
                                                    <td> <p><?php echo e(date('m/d/Y', strtotime($user->seller->seller_stalls->start_date))); ?></p></td>
                                                </tr>

                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>End Date: </strong></p> </td>
                                                    <td> <p><?php echo e(date('m/d/Y', strtotime($user->seller->seller_stalls->end_date))); ?></p></td>
                                                </tr>

                                                <tr>
                                                    <td class="stall-info-title-container"><p><strong>Duration (Months): </strong></p> </td>
                                                    <td> <p><?php echo e($user->seller->seller_stalls->duration); ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <a href="<?php echo e(asset( 'public/contracts/' . $user->seller->seller_stalls->contact_of_lease )); ?>"  target="_blank" class="btn option-btn">
                                                            <span class="fa fa-eye"></span> View Contract
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                      <?php elseif($user->seller->seller_stalls->status == 'pending'): ?>
                                          <h3 class="alert alert-warning">Waiting for Approval</h3>

                                      <?php elseif($user->seller->seller_stalls->status == 'inactive'): ?>
                                          <h3 class="alert alert-danger">Please check your contract and contact you admin for renewal.</h3>
                                      <?php endif; ?>


                                      <?php if($user->seller->seller_stalls->stall_appointment): ?>
                                          <h4>Appointment Details</h4>

                                          <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <th>Date of Appointment</th>
                                                    <th>Status</th>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e($user->seller->seller_stalls->stall_appointment->date); ?></td>
                                                        <td><?php echo e($user->seller->seller_stalls->stall_appointment->status); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                      <?php endif; ?>


                                  </div>
                              </div>

                          </div>


                      </div>

                      <?php if(  $user->seller->seller_stalls->status  == 'Pending Approval'): ?>

                          <div class="alert alert-success">
                              <?php echo e($user->seller->seller_stalls->status); ?>

                          </div>

                      <?php else: ?>

                      <?php endif; ?>
                  </div>

          </div>
      </div>
      <?php endif; ?>
    <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/users/sellerdetails.blade.php ENDPATH**/ ?>