<?php $__env->startSection('title'); ?>
    <title>Admin | Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="text-center">Trang chủ</h5>
            <p class="card-text text-center">
                Admin - Trang chủ
            </p>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/OrderFood/resources/views/admin/home.blade.php ENDPATH**/ ?>