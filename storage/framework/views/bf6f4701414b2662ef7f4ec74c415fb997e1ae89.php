<?php $__env->startSection('content'); ?>
    <div class="orders">
       <div class="orders-details-wrapper">
            <div class="orders-details-wrapper-left">
                <h3>Order ID: <?php echo e($orders->transaction_id); ?></h3>
                <div class="order-details-box order-status">
                    <h1><?php echo e($orders->status); ?></h1>
                </div>
                <div class="order-updates">
                    <?php if($orders->order_statuses()->exists()): ?>
                        <?php $__currentLoopData = $orders->order_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="status-update">
                                <div class="status-update-fl">
                                    <p><?php echo e($order_status->status->status); ?></p>
                                    <p><?php echo e(date('F d, Y h:i:s a', strtotime($order_status->created_at))); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
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

              
                <div class="info-item long">
                    <div id="map" style="width: 100%; height: 480px"></div>

                    

                    <script
                            src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('apikeys.keys')); ?>&callback=initMap&v=weekly"
                            defer
                    ></script>
                    <script>
                        let map, activeInfoWindow, markers = [];
                        let marker;
                        let defaultPosition = {
                            lat: <?php echo e(( $orders->order_delivery_detail->latitude  ? $orders->order_delivery_detail->latitude : '13.749684')); ?>,
                            lng: <?php echo e(( $orders->order_delivery_detail->longitude  ? $orders->order_delivery_detail->longitude : '120.9395233')); ?>,
                        };
                        /* ----------------------------- Initialize Map ----------------------------- */
                        function initMap() {
                            map = new google.maps.Map(document.getElementById("map"), {
                                center: defaultPosition,
                                zoom: 15
                            });

                            marker =  new google.maps.Marker({
                                position: defaultPosition,
                                label:'<?php echo e(auth()->user()->first_name); ?>',
                                map: map,
                            });


                            /*map.addListener("click", function(event) {

                                addMarker(event.latLng, map)
                            });*/

                        }


                        /* --------------------------- Initialize Markers --------------------------- */
                        function addMarker(location, map) {
                            // Add the marker at the clicked location, and add the next-available label
                            // from the array of alphabetical characters.




                            if ( marker ) {
                                marker.setPosition(location);
                            } else {
                                marker =  new google.maps.Marker({
                                    position: location,
                                    label: 'A',
                                    map: map,
                                });
                            }

                        }

                    </script>

                    <!--
                      The `defer` attribute causes the callback to execute after the full HTML
                      document has been parsed. For non-blocking uses, avoiding race conditions,
                      and consistent behavior across browsers, consider loading using Promises
                      with https://www.npmjs.com/package/@googlemaps/js-api-loader.
                      -->


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
                                <td class="td-right"><p><?php echo e($product->seller_product->price); ?></p></td>
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

                <hr>


                <?php if($orders->order_statuses->last()->status->status == 'Placed'): ?>

                    <?php if(!isset($_GET['cancel'])): ?>

                        <form action="" method="GET">
                            <input type="hidden" name="cancel" value="1">
                            <input type="hidden" name="order_id" value="<?php echo e($orders->id); ?>">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="home-btn option-btn">
                                        <?php echo e(__('Cancel Order')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>

                        <?php else: ?>
                        <form action="<?php echo e(route('buyer.orders.cancel', ['order_id' => $orders->transaction_id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="cancel" value="1">
                            <input type="hidden" name="order_id" value="<?php echo e($orders->id); ?>">
                            <input type="hidden" name="transaction_id" value="<?php echo e($orders->transaction_id); ?>">
                            <label for="" class="col-form-label">Reason</label>
                            <textarea class="form-control-lg" type="hidden" name="reason" rows="10" style="width: 100%" ></textarea>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="pal-button btn-orange">
                                        <?php echo e(__('Cancel Order')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
       </div>
   </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.buyer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/buyer/orders/find.blade.php ENDPATH**/ ?>