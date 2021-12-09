<?php $__env->startSection('title'); ?>
    <title>Không tìm thấy trang</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Chức năng này đang được phát triển.</h3>

            <p>
                Chúng tôi thành thật xin lỗi về trải nghiệm này! <br>
                Bạn có thể <a href="/">quay về trang chủ</a> và sử dụng các tính năng khác.
            </p>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\admin\404.blade.php ENDPATH**/ ?>