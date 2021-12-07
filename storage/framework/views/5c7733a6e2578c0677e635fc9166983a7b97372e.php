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
                <a href="index.html">Trang chủ</a>
                <i class="fas fa-angle-right"></i>
                <a href="cart.html">Giỏ hàng</a>
            </span>
        </div>
    </section>
    <!-- ====   Cart    ==== -->

    <section class="cart-page">
        <div class="cart-page-heading">
            <div class="cart-checkbox">
                <input type="checkbox" name="" id="">
            </div>
            <div class="cart-product">
                <p>Sản phẩm</p>
            </div>
            <div class="cart-price">
                <p>Đơn giá</p>
            </div>
            <div class="cart-quantity">
                <p>Số lượng</p>
            </div>
            <div class="cart-total">
                <p>Số tiền</p>
            </div>
        </div>
        <div class="cart-page-content">
            <div class="row">
                <div class="cart-checkbox">
                    <input type="checkbox" name="" id="">
                </div>
                <div class="cart-product">
                    <span>
                        <img src="client/images/buger.jpg" alt="">
                        <p>Hamburger bò phô mai</p>
                    </span>
                </div>
                <div class="cart-price">
                    <p>20.000₫</p>
                </div>
                <div class="cart-quantity">
                    <input type="number" name="" id="" value="1">
                </div>
                <div class="cart-total">
                    <p>20.000₫</p>
                </div>
            </div>
            <div class="row">
                <div class="cart-checkbox">
                    <input type="checkbox" name="" id="">
                </div>
                <div class="cart-product">
                    <span>
                        <img src="client/images/pizza-1.png" alt="">
                        <p>Pizza tôm mực</p>
                    </span>
                </div>
                <div class="cart-price">
                    <p>30.000₫</p>
                </div>
                <div class="cart-quantity">
                    <input type="number" name="quantity" id="" min="1" max="" value="1">
                </div>
                <div class="cart-total">
                    <p>30.000₫</p>
                </div>
            </div>
        </div>

        <div class="cart-footer">
            <button class="btn btn-secondary">Xoá</button>
            <h3>Tổng thanh toán: <span>50.000₫</span></h3>
            <button class="btn btn-primary">Đặt hàng</button>
        </div>
    </section>
    <!-- --------xx--------- -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/cart.blade.php ENDPATH**/ ?>