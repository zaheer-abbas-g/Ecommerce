<?php $__env->startSection('content'); ?>
    <h1>User panel jjj</h1>
    <div class="card-body">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php echo e(__('You are logged in!')); ?>

    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\YahooEcommerce\Ecommerce\resources\views/user/home.blade.php ENDPATH**/ ?>