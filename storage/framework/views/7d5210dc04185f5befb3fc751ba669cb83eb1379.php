<?php $__env->startSection('content'); ?>

<div class="profile">
        <div class="profile-wrapper">
            <div class="card basic-info" style="width: 18rem;">
                <div class="card-header basic-info-header">
                    User Information
                </div>
                <div class="basic-info-body">

                    <!-- <?php if(isset($message)): ?>
                        <div class="alert alert-<?php echo e(($success) ? 'success' : 'danger'); ?>"><strong><?php echo e($message); ?></strong></div>
                    <?php endif; ?> -->
                    <form action="<?php echo e(route('admin.users.update', [$user->id])); ?>" method="POST" class="form-">
                        <?php echo csrf_field(); ?>
                        <div class="info-body-flex">

                            <div class="info-item long">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control"
                                       id="first_name"
                                       name ="first_name"
                                       placeholder="" value="<?php echo e($user->first_name); ?>" >
                            </div>

                            <div class="info-item long">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control"
                                       id="last_name"
                                       name="last_name"
                                       placeholder="" value="<?php echo e($user->last_name); ?>" >
                            </div>

                            <div class="info-item long">
                                <label for="email">Email</label>
                                <input type="email" class="form-control"
                                       id="email"
                                       name="email"
                                       placeholder="" value="<?php echo e($user->email); ?>" >
                            </div>

                            <div class="info-item long">
                                <label for="password">Password</label>
                                <input type="password" class="form-control"
                                       id="password"
                                       name="password"
                                       placeholder="" value="" >
                            </div>

                            <?php if($user->seller()->exists()): ?>
                                <div class="info-item long">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control"
                                        id="birthday"
                                        name="birthday"
                                        placeholder="" value="<?php echo e(date('m-d-Y', strtotime($user->seller->birthday))); ?>" >
                                </div>

                                <div class="info-item long">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control"
                                        id="age"
                                        name="age"
                                        placeholder="" value="<?php echo e($user->seller->age); ?>" readonly>
                                </div>

                                <div class="info-item long">
                                    <label for="gender">Gender</label>
                                    <select  class="form-control" id="gender" name="gender" placeholder="Gender" value="<?php echo e($user->seller->gender); ?>" >
                                        <option value="Male"   <?php echo e(( $user->seller->gender == 'Male')   ? 'selected' : ''); ?>>Male</option>
                                        <option value="Female" <?php echo e(( $user->seller->gender == 'Female')  ? 'selected' : ''); ?>>Female</option>
                                        <option value="Others" <?php echo e(( $user->seller->gender == 'Others')  ? 'selected' : ''); ?>>Others</option>
                                    </select>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Submit')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    $('#birthday').on('change', function () {

        var age = getAge( $(this).val());
        $('#age').val( age );
    })
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\palengkesite\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>