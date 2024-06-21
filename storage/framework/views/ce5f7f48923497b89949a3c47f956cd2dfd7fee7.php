<?php $__env->startSection('title'); ?>
    <title>Giỏ hàng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- ---------------xx-------------- -->
    <section class="page-heading">
        <div class="content">
            <h2>Giỏ hàng</h2>
            <span>
                <i class="fas fa-home"></i>
                <a href="/">Trang chủ</a>
                <i class="fas fa-angle-right"></i>
                <a href="cart">Giỏ hàng</a>
                <i class="fas fa-angle-right"></i>
                <a href="cart_details">Chi tiết đơn hàng</a>
            </span>
        </div>
    </section>
    <!-- ====   Cart    ==== -->

    <section class="cart-page">
        <?php if(session('success')): ?>
            <div class="cart-page-heading" style="background: #00b44e; margin-bottom: 10px; display: inline-block">
                <p>
                    <?php echo \Session::get('success'); ?>

                </p>
            </div>
        <?php endif; ?>
            <?php if(session('fail')): ?>
                <div class="cart-page-heading" style="background: #ff5c0f; margin-bottom: 10px; display: inline-block">
                    <p>
                        <?php echo \Session::get('fail'); ?>

                    </p>
                </div>
            <?php endif; ?>
        <div class="cart-page-heading">
            <div class="cart-checkbox">

            </div>
            <div class="cart-product">
                <p>Sản phẩm</p>
            </div>
            <div class="cart-price">
                <p>Đơn giá</p>
            </div>
            <div class="cart-price">
                <p>Số lượng</p>
            </div>
            <div class="cart-total">
                <p>Số tiền</p>
            </div>

        </div>
            <?php
                $sum = 0;
            ?>
                <div class="cart-page-content">
                <?php $__currentLoopData = $orderdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="cart-checkbox">

                        </div>
                        <div class="cart-product">
                            <span>
                                <img src="img/products/<?php echo e($key -> products_linked ->image); ?>" alt="">
                                <p><?php echo e($key -> products_linked -> name); ?></p>
                            </span>
                        </div>
                        <div class="cart-price">
                            <p><?php echo e(number_format($key -> price)); ?>₫</p>
                        </div>
                        <div class="cart-total">
                            <p><?php echo e(number_format($key -> amount)); ?></p>
                        </div>
                        <div class="cart-total">
                            <p><?php echo e(number_format($key -> price)); ?></p>

                        </div>


                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

        <div class="cart-footer">
            <button type="submit" class="btn btn-secondary" onclick="history.back()">Quay lại</button>
            <h3 ><span></span></h3>
            <h3 >Tổng thanh toán: <span><?php echo e(number_format($order -> total)); ?>₫</span></h3>
        </div>


    </section>

    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
    <!-- --------xx--------- -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/client/cart_details.blade.php ENDPATH**/ ?>