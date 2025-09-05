<?php $__env->startComponent('mail::message'); ?>

#COD Request

Hi, <?php echo e($order->buyer->user->first_name); ?>!

<p>Your COD Request has been confirmed.</p>

<table class="table table-bordered" style="width: 100%; text-align: left">
    <tr>
        <th>Order ID</th>
        <th><?php echo e($order->transaction_id); ?></th>
    </tr>
    <tr>
        <td><strong>Name</strong></td>
        <td><?php echo e($order->buyer->user->first_name); ?> <?php echo e($order->buyer->user->last_name); ?></td>
    </tr>

    <tr>
        <td><strong>Shipping Address</strong></td>
        <td><?php echo e($order->order_delivery_detail->stnumber); ?>

            <?php echo e($order->order_delivery_detail->stname); ?>

            <?php echo e($order->order_delivery_detail->barangay); ?>,

            <?php echo e($order->order_delivery_detail->city); ?>, <?php echo e($order->order_delivery_detail->province); ?> <?php echo e($order->order_delivery_detail->zip); ?>

        </td>
    </tr>
</table>
<br>
<br>
<table class="table table-bordered text-left" style="width: 100%; text-align: left">
    <tr>
        <th colspan="3">Order Details</th>
    <tr>
    <?php $__currentLoopData = $order->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e(($product->seller_product->custom_title != '' ? $product->seller_product->custom_title : $product->product->product_name)); ?></strong></td>
            <td> ₱ <?php echo e($product->seller_product->price); ?> x <?php echo e($product->quantity); ?></td>
            <td style="text-align: right">₱ <?php echo e($product->total); ?></td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th colspan="2">Total</th>
        <?php $__currentLoopData = $order->order_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th style="text-align: right" colspan="1">₱ <?php echo e(number_format($product->seller_product->price * $product->quantity, 2)); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
</table>

<?php $__env->startComponent('mail::button', ['url' => route('buyer.orders.find', ['order_id' => $order->transaction_id])]); ?>
    View Order
<?php echo $__env->renderComponent(); ?>

<br>


Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\laragon\www\palengkesite\resources\views/emails/order-cod-confirmed.blade.php ENDPATH**/ ?>