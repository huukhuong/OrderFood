<?php $__env->startSection('title'); ?>
<title>Đặt hàng</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ---------------xx-------------- -->
    <section class="page-heading">
        <div class="content">
            <h2>Đặt hàng</h2>
            <span>
                <i class="fas fa-home"></i>
                <a href="/">Trang chủ</a>
                <i class="fas fa-angle-right"></i>
                <a href="/cart">Giỏ hàng</a>
                <i class="fas fa-angle-right"></i>
                <a href="/order">Đặt hàng</a>
            </span>
        </div>
    </section>
    <!-- ====   Order    ==== -->
    <section class="order-page">
        <div class="order-page-content">
            <div class="customer-info">
                <div class="heading">
                    <h3>Thông tin đặt hàng</h3>
                </div>
                <div class="content">
                    <form action="">
                        <div class="form-group">
                            <label for="">Tên người đặt hàng</label>
                            <input type="text" name="name" value="<?php echo e(auth()->user() ->name); ?> ">
                        </div>
                        <div class="form-group">
                            <label for="">Điện thoại</label>
                            <input type="text" name="phone" value="<?php echo e(auth()->user() ->phone); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" value="<?php echo e(auth()->user() ->address); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <textarea name="description" cols="30" rows="5"><?php echo e(old('description')); ?></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <div class="order-detail">
                <div class="heading">
                    <h3>Chi tiết đặt hàng</h3>
                    <p>Hoá đơn thanh toán</p>
                </div>
                <div class="content">
                    <i class="far fa-list-alt"></i>
                    <div class="list-items">
                        <?php if(Session::has('cart')): ?>
                            <?php
                                $sum = 0;
                            ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <span><?php echo e($item['quantity']); ?> x <?php echo e($item['name']); ?> </span>
                                    <span><?php echo e(number_format($item['quantity'] * $item['price'],0)); ?>₫</span>
                                </div>
                                <?php
                                    $sum += $item['quantity'] * $item['price'];
                                ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                    <p>Thanh toán khi nhận hàng</p>
                    <div class="total">
                        <span>Tổng cộng:</span>
                        <strong> <?php
                               echo number_format($sum ,0);
                            ?>₫</strong>
                    </div>
                    <a href="order_success">
                        <button class="btn btn-primary">Đặt hàng</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/order.blade.php ENDPATH**/ ?>