<?php $__env->startSection('content'); ?>
    <div class="orders">
        <div class="orders-details-wrapper">
            <div class="orders-details-wrapper-left">
                <h3>Order ID: <?php echo e($orders->transaction_id); ?></h3>
                <div class="order-details-box order-status">
                    <h2><?php echo e($orders->status); ?></h2>
                </div>
                <div class="order-details-box order-updates">
                    <h2><?php echo e($orders->order_statuses->last()->status->status); ?></h2>

                    <?php $arr_status = [] ?>

                    <?php $__currentLoopData = $orders->order_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $arr_status[] =$order_status->status_id ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <form action="<?php echo e(route('seller.orders.status.update')); ?>" id="updateStatus" class="form-group" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="order_id" value="<?php echo e($orders->id); ?>">
                        <?php if($orders->status !== 'Completed' && $orders->status !== 'Cancelled'): ?>
                        <select name="status" id="orderStatus" class="form-control">
                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <?php if($status->status !== 'Ship'): ?>
                                <option value="<?php echo e($status->id); ?>"
                                        <?php echo e((in_array($status->id, $arr_status) ? 'disabled' : '')); ?>



                                        <?php echo e(( $orders->order_statuses->last()->status->status == $status->status  ? 'selected' : '' )); ?>


                                ><?php echo e($status->status); ?></option>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="order-details-box order-customer-info">
                    <div class="order-info-section-1">
                        <h3>Contact Information</h3>
                        <p><?php echo e($orders->buyer->user->email); ?></p>

                        <h3>Shipping Address</h3>
                        <p>
                            <?php echo e($orders->order_delivery_detail->stnumber); ?>

                            <?php echo e($orders->order_delivery_detail->stname); ?>

                            <?php echo e($orders->order_delivery_detail->barangay); ?>,
                            <?php echo e($orders->order_delivery_detail->city); ?>,
                            <?php echo e($orders->order_delivery_detail->province); ?>

                            <?php echo e($orders->order_delivery_detail->zip); ?>


                        </p>

                        <h3></h3>
                        <p></p>

                        <h3></h3>
                        <p></p>
                    </div>
                    <div class="order-info-section-2">
                        <h3>Payment Method</h3>
                        <?php $__currentLoopData = $orders->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($orders->payment_option->payment_option); ?> - ₱ <?php echo e(number_format($product->seller_product->price * $product->quantity, 2)); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <h3>Billing Address</h3>
                        <p>
                            <?php echo e($orders->order_delivery_detail->stnumber); ?>

                            <?php echo e($orders->order_delivery_detail->stname); ?>

                            <?php echo e($orders->order_delivery_detail->barangay); ?>,
                            <?php echo e($orders->order_delivery_detail->city); ?>,
                            <?php echo e($orders->order_delivery_detail->province); ?>

                            <?php echo e($orders->order_delivery_detail->zip); ?>


                        </p>
                    </div>
                </div>
            </div>
            <div class="orders-details-wrapper-right">
                <table class="table table-borderless order-items">
                    <?php $__currentLoopData = $orders->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="td-left"><img src="<?php echo e(asset($product->seller_product->image)); ?>" alt=""></td>
                            <td class="td-center"><strong><?php echo e($product->product->product_name); ?> </strong>x <?php echo e($product->quantity); ?></td>
                            <td class="td-right"><p>₱ <?php echo e(number_format($product->seller_product->price * $product->quantity, 2)); ?></p></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

                <hr>

                <table class="table table-borderless order-items">

                    <tr>
                        <td class="td-left"><p>Price</p></td>
                        <td class="td-center"></td>
                        <?php $__currentLoopData = $orders->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="td-right"><p>₱ <?php echo e($product->seller_product->price); ?></p></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>

                    <tr>
                        <td class="td-left"><p>Quantity</p></td>
                        <td class="td-center"></td>
                        <?php $__currentLoopData = $orders->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="td-right"><p><?php echo e($product->quantity); ?></p></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>

                </table>

                <hr>

                <table class="table table-borderless order-items">

                    <tr>
                        <td class="td-left"><p>Total</p></td>
                        <td class="td-center"></td>
                        <?php $__currentLoopData = $orders->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="td-right"><p>₱ <?php echo e(number_format($product->seller_product->price * $product->quantity, 2)); ?></p></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <script>

        var doc = $(document);
        const order = {
            init: function(){
                console.log('A script has been loaded');
                order.updateStatus($('#orderStatus'));
            },
            updateStatus: function(trigger){
                trigger.change(function(e){
                    $('#updateStatus').submit();
                });
            },

        };

        doc.ready(function () {
            order.init();
        });

        $(window).on('load', function(){

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/seller/orders/find.blade.php ENDPATH**/ ?>