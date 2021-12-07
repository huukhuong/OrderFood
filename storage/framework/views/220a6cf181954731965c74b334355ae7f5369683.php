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
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Điện thoại</label>
                            <input type="text" name="phone" value="<?php echo e(old('phone')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" value="<?php echo e(old('address')); ?>">
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
                        <div class="item">
                            <span>1 x Hamburger bò phô mai</span>
                            <span>20.000₫</span>
                        </div>
                        <div class="item">
                            <span>1 x Pizza tôm mực</span>
                            <span>30.000₫</span>
                        </div>
                    </div>
                    <p>Thanh toán khi nhận hàng</p>
                    <div class="total">
                        <span>Tổng cộng:</span>
                        <strong>50.000₫</strong>
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