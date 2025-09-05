<?php $__env->startSection('content'); ?>
    <div class="orders">
       <div class="orders-wrapper buyer-order">
            <h3>My Orders</h3>

            <hr>

           <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
               <li class="nav-item" role="presentation">
                   <a
                           class="nav-link"
                           id="#orderTabPerStatus"
                           data-mdb-toggle="tab"
                           href="?status=pending"
                           role="tab"
                           aria-controls="ex1-tabs-1"
                           aria-selected="true"
                   >Pending 
                        <span class="notif badge badge-danger">
                            <?php echo e(auth()->user()->buyer->orders->where('status', 'pending')->count()); ?>

                        </span>
                    </a> 
               </li>
               <li class="nav-item" role="presentation">
                   <a
                           class="nav-link "
                           id="#orderTabPerStatus"
                           data-mdb-toggle="tab"
                           href="?status=confirmed"
                           role="tab"
                           aria-controls="ex1-tabs-1"
                           aria-selected="true"
                   >Confirmed
                    <span class="notif badge badge-danger">
                        <?php echo e(auth()->user()->buyer->orders->where('status', 'confirmed')->count()); ?>

                    </span>
                    </a>
               </li>
              
               <li class="nav-item" role="presentation">
                   <a
                           class="nav-link"
                           id="#orderTabPerStatus"
                           data-mdb-toggle="tab"
                           href="?status=On Delivery"
                           role="tab"
                           aria-controls="ex1-tabs-3"
                           aria-selected="false"
                   >On Delivery
                    <span class="notif badge badge-danger">
                        <?php echo e(auth()->user()->buyer->orders->where('status', 'On Delivery')->count()); ?>

                    </span>
                    </a>
               </li>

               <li class="nav-item" role="presentation">
                   <a
                           class="nav-link"
                           id="#orderTabPerStatus"
                           data-mdb-toggle="tab"
                           href="?status=Delivered"
                           role="tab"
                           aria-controls="ex1-tabs-3"
                           aria-selected="false"
                   >Delivered
                    <span class="notif badge badge-danger">
                        <?php echo e(auth()->user()->buyer->orders->where('status', 'Delivered')->count()); ?>

                    </span>
                    </a>
               </li>

               <li class="nav-item" role="presentation">
                   <a
                           class="nav-link"
                           id="#orderTabPerStatus"
                           data-mdb-toggle="tab"
                           href="?status=Completed"
                           role="tab"
                           aria-controls="ex1-tabs-3"
                           aria-selected="false"
                   >Completed
                    <span class="notif badge badge-danger">
                        <?php echo e(auth()->user()->buyer->orders->where('status', 'Completed')->count()); ?>

                    </span>
                    </a>
               </li>

               <li class="nav-item" role="presentation">
                   <a
                           class="nav-link"
                           id="#orderTabPerStatus"
                           data-mdb-toggle="tab"
                           href="?status=cancelled"
                           role="tab"
                           aria-controls="ex1-tabs-3"
                           aria-selected="false"
                   >Cancelled
                    <span class="notif badge badge-danger">
                        <?php echo e(auth()->user()->buyer->orders->where('status', 'cancelled')->count()); ?>

                    </span>
                    </a>
               </li>
           </ul>

           <hr>
              <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="my-order-list">
                   <div class="my-order-item">
                       <div class="my-order-details">
                           <div class="details-up">
                               <div>
                                   <p class="order-date"><?php echo e(date('F d, Y', strtotime($order->created_at))); ?></p>
                                   <p class="order-no">Order no. PS-<?php echo e($order->transaction_id); ?></p>
                               </div>
                               <div>
                                    <p class="order-total-label">Total</p>
                                    <?php $__currentLoopData = $order->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="order-total">₱<?php echo e(number_format($product->seller_product->price * $product->quantity, 2)); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </div>
                           </div>
                           <div class="details-thumbnail">
                               <?php echo e($order->seller->seller_stalls->name); ?>

                               <br>
                               <?php $__currentLoopData = $order->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php echo e($product->product->product_name); ?>

                                   <br>
                                   
                                   <?php echo e($product->seller_product->price); ?> x <?php echo e($product->quantity); ?> =  <?php echo e(number_format($product->seller_product->price * $product->quantity, 2)); ?>

                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </div>
                       </div>
                       <div class="my-orders-actions">
                           <div class="alert alert-success"><?php echo e($order->status); ?></div>

                           <?php if( $order->status == 'pending' && $order->payment_option_id == '1'): ?>
                             <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#order<?php echo e($order->transaction_id); ?>">₱ <?php echo e(number_format($order->total, 2)); ?></a>
                           <?php endif; ?>
                           <a class="pal-button btn-orange" href="<?php echo e(route('buyer.orders.find', ['id' => $order->transaction_id])); ?>">View Order</a>
                       </div>
                   </div>
               </div>



                   <div class="modal" tabindex="-1" role="dialog" id="order<?php echo e($order->transaction_id); ?>">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title">Modal title</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">

                                   <?php if($message = Session::get('success')): ?>
                                       <div class="custom-alerts alert alert-success fade in">
                                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                           <?php echo $message; ?>

                                       </div>
                                       <?php Session::forget('success');?>
                                   <?php endif; ?>

                                   <?php if($message = Session::get('error')): ?>
                                       <div class="custom-alerts alert alert-danger fade in">
                                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                           <?php echo $message; ?>

                                       </div>
                                       <?php Session::forget('error');?>
                                   <?php endif; ?>
                                   <div class="panel-heading"><b>Paywith Paypal</b></div>
                                   <div class="panel-body">
                                       <form class="form-horizontal" method="POST" id="payment-form" role="form" action="<?php echo URL::route('paypal'); ?>" >
                                           <?php echo e(csrf_field()); ?>


                                           <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                                               <label for="amount" class="col-md-4 control-label">Enter Amount</label>

                                               <div class="col-md-6">
                                                   <input id="amount" type="text" class="form-control" name="amount" value="<?php echo e($order->total); ?>" readonly>
                                                   <input id="order_id" type="hidden" class="form-control" name="order_id" value="<?php echo e($order->id); ?>" readonly>

                                                   <?php if($errors->has('amount')): ?>
                                                       <span class="help-block">
                                                            <strong><?php echo e($errors->first('amount')); ?></strong>
                                                        </span>
                                                   <?php endif; ?>
                                               </div>
                                           </div>

                                           <div class="form-group">
                                               <div class="col-md-6 col-md-offset-4">
                                                   <button type="submit" class="btn btn-primary">
                                                       Paywith Paypal
                                                   </button>
                                               </div>
                                           </div>
                                       </form>
                                   </div>

                               </div>
                               <div class="modal-footer">

                               </div>
                           </div>
                       </div>
                   </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



       </div>
   </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.buyer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/buyer/orders/index.blade.php ENDPATH**/ ?>