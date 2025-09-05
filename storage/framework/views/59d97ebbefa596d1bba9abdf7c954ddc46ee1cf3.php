<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="profile">
            <div class="profile-wrapper">


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>From</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($contact->name); ?></td>
                                <td><?php echo e($contact->from); ?></td>
                                <td><?php echo e($contact->subject); ?></td>
                                <td><?php echo e(substr($contact->message, 100)); ?>...</td>
                                <td>
                                    <a href="<?php echo e(route('admin.contact-us.find', $contact->id)); ?>">View</a>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/contact-us/show.blade.php ENDPATH**/ ?>