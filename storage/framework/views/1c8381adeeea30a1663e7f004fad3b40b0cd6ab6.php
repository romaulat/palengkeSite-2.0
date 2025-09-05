<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">
            <form action="" method="GET"  class="form-group list-header" id="form-header">
                <h3>Seller Stalls</h3>

                <div class="list-header-fields">
                        
                        <div class="form-group">
                            <input  class="form-control" type="text" name="search" id="search" value="<?php echo e(old('search') ??  $_GET['search']  ?? ''); ?>" placeholder="Search">
                        </div>

                        <div class="form-group">
                            <select  class="form-control" id="orderby" name="orderby" placeholder="Order By" value="" >
                                <option value="A-Z"     <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'A-Z' ) ? 'selected' : '' : '' ); ?>>Name (A-Z)</option>
                                <option value="Z-A"     <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'Z-A' ) ? 'selected' : '' : '' ); ?>>Name (Z-A)</option>
                                <option value="recent"  <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'recent' ) ? 'selected' : '' : '' ); ?>>Recent</option>
                                <option value="oldest"  <?=  ( isset( $_GET['orderby'] ) ?  ( $_GET['orderby'] == 'oldest' ) ? 'selected' : '' : '' ); ?>>Oldest</option>
                            </select>
                        </div>

                        <?php if(isset($_GET['page'])): ?>
                            <input type="hidden" name="page" value="<?php echo e($_GET['page']); ?>">
                        <?php endif; ?>
                </div>
            </form>

                <?php echo e(session()->get('market')); ?>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Seller</th>
                            <th>Stall No.</th>
                            <th>Date Created</th>
                            <th>Section</th>
                            <th>Sqm</th>
                            <th>Location</th>
                            <th>Amount per sqm</th>
                            <th>Rental Fee</th>
                            <th>Annual Fee</th>
                            <th>Contract</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $stalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="stall-approval-row">
                                <td> <?php echo e($stall->seller->user->first_name); ?> <?php echo e($stall->seller->user->last_name); ?></td>
                                <td> <?php echo e($stall->stall->number); ?></td>
                                <td> <?php echo e(date('m/d/Y', strtotime($stall->stall->created_at))); ?></td>
                                <td> <?php echo e($stall->stall->section); ?></td>
                                <td> <?php echo e($stall->stall->sqm); ?></td>
                                <td> <?php echo e($stall->stall->market->market); ?></td>
                                <td> <?php echo e($stall->stall->amount_sqm); ?></td>
                                <td> <?php echo e($stall->stall->rental_fee); ?></td>
                                <td> <?php echo e($stall->stall->annual_fee); ?></td>
                                <td>
                                    <?php if($stall->contact_of_lease): ?>
                                        <a href="<?php echo e(asset( $stall->contact_of_lease )); ?>"  target="_blank"><span class="fa fa-eye"></span> View Contract</a>
                                    <?php else: ?>
                                        <button  class="btn option-btn" data-toggle="modal" data-target="#uploadContract<?php echo e($stall->id); ?>" >  <span class="fa fa-upload"></span> Upload Contract</button>
                                    <?php endif; ?>
                                </td>
                                <td>

                                    <?php if( $stall->status == 'pending' &&  $stall->type == 0 ): ?>
                                        <form action="<?php echo e(route('admin.seller.stalls.approve')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="seller_id" value="<?php echo e($stall->seller->user->id); ?>">
                                            <input type="hidden" name="seller_stall_id" value="<?php echo e($stall->id); ?>">
                                            <button type="submit" target="_blank" class="btn btn-primary">Approve</button>
                                        </form>
                                    <?php else: ?>
                                        <div><?php echo e($stall->status); ?></div>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if( isset($_GET) ): ?>
                <?php echo e($stalls->appends($_GET)->links()); ?>

                <?php else: ?>
                <?php echo e($stalls->links()); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <?php $__currentLoopData = $stalls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="uploadContract<?php echo e($stall->id); ?>" tabindex="-1" role="dialog" aria-labelledby="uploadContractLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadContractLabel">Upload Contract</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <form action="<?php echo e(route('admin.seller.stalls.upload.contract')); ?>" method="POST"enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group" style="display: flex; flex-flow:  row wrap">

                                    <div class="form-group short">
                                        <label for="">Start Date</label>
                                        <input type="date" class="form-control <?php if ($errors->has('start_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('start_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="start_date" id="start_date" value="<?php echo e($stall->start_date); ?>">

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
                                    <div class="form-group short">
                                        <label for="">End Date</label>
                                        <input type="date" class="form-control <?php if ($errors->has('end_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('end_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="end_date" id="end_date" value="<?php echo e($stall->end_date); ?>">

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
                                    <div class="form-group long">
                                        <label for="">Duration</label>
                                        <input type="text" class="form-control <?php if ($errors->has('duration')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duration'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="duration" id="duration"  value="<?php echo e($stall->duration); ?>" readonly>

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
                                    <div class="form-group long">
                                        <label for="">Contract Lease</label>
                                        <input type="file" class="form-control <?php if ($errors->has('contract_of_lease')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contract_of_lease'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contract_of_lease" id="contract_of_lease" >

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

                                    <input type="hidden" name="seller_stall_id" value="<?php echo e($stall->id); ?>">
                                </div>
                                <button  class="btn option-btn" data-toggle="modal" data-target="#uploadModal" >  <span class="fa fa-upload"></span> Upload Contract</button>
                            </form>
                    </div>

                </div>
                <div class="modal-footer">
                    </div>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <script>
        let date_1 = '';
        let date_2 = '';
        const products = {
            initDuration: function( trigger ){
                trigger.change(function () {

                    var self = $(this);
                    if(self.attr('id') == 'end_date'){
                         date_1 = new Date(self.val());
                    }
                    if(self.attr('id') == 'start_date'){
                         date_2 = new Date(self.val());
                    }

                    if(date_1 !== '' && date_2 !== ''){
                    // let difference = date_1.getTime() - date_2.getTime();
                    // let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
                    // $('#duration').val(TotalDays);

                    
                        var months;
                        var result;
                        months = (date_1.getFullYear() - date_2.getFullYear()) * 12;
                        months -= date_2.getMonth();
                        months += date_1.getMonth();

                        result = months <= 0  ? 0 : months;
                        self.closest('form').find('#duration').val(result);
                    }
                });
            },

        };

            $(window).on('load', function(){
           

            products.initDuration($('input[type="date"]'));
        });

    </script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/seller/stalls/index.blade.php ENDPATH**/ ?>