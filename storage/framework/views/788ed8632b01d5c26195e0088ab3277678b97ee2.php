

<?php $__env->startSection('title'); ?>
    <title>Đặt hàng thành công</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ====  Confirm  Order    ==== -->
    <section class="confirm-order-page">
        <div class="box">
            <div class="message">
                <h3>Thông báo</h3>
            </div>
            <div class="content">
                <svg width="72" height="72">
                    <g fill="none" stroke="#8EC343" stroke-width="2">
                        <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;">
                        </circle>
                        <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                            style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                    </g>
                </svg>
                <h3>Đặt hàng thành công!</h3>
                <p>Đơn hàng sẽ được giao trong thời gian ngắn nhất.</p>
                <a href="/"><button class="btn btn-primary">Quay lại cửa hàng</button></a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/client/order_success.blade.php ENDPATH**/ ?>