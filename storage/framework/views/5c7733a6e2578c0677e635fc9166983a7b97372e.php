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
            <?php if(Session::has('cart')): ?>
                <?php
                    $sum = 0;
                ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="cart-checkbox">
                            
                        </div>
                        <div class="cart-product">
                            <span>
                                <img src="img/products/<?php echo e($item['image']); ?>" alt="">
                                <p><?php echo e($item['name']); ?></p>
                            </span>
                        </div>
                        <div class="cart-price">
                            <p><?php echo e(number_format($item['price'])); ?>₫</p>
                        </div>
                        <form action="updatecart" method="post">
                            <div class="cart-quantity">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($item['id']); ?>" name="idUpdate">
                                <input type="number" name="quantityUpdate" id="" value="<?php echo e($item['quantity']); ?>">
                                <button type="submit" class="btn btn-warning" value="Sửa">
                                    Sửa
                                </button>
                                <a href="deletecart/<?php echo e($item['id']); ?>" class="btn btn-danger">
                                    Xoá
                                </a>
                            </div>

                        </form>
                        <div class="cart-total">
                            <?php
                                $price = $item['price'];
                                $quantity = $item['quantity'];
                                $total_row = $price * $quantity;
                                $sum += $total_row;
                            ?>
                            <p><?php echo e(number_format($item['price'] * $item['quantity'])); ?>₫</p>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <?php endif; ?>
        </div>

        <div class="cart-footer">
            <button class="btn btn-secondary">Xoá</button>
            <?php if(Session::has('cart') && $sum > 0): ?>
            <h3>Tổng thanh toán: <span><?php echo e(number_format($sum)); ?>₫</span></h3>
                <a href="order">
                    <button class="btn btn-primary">Đặt hàng</button>
                </a>
            <?php else: ?>
                <h3>Tổng thanh toán: <span> 0₫</span></h3>
                <a href="order" style="pointer-events: none; cursor: default;">
                    <button class="btn btn-primary">Đặt hàng</button>
                </a>
            <?php endif; ?>

        </div>
    </section>
    <!-- --------xx--------- -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/cart.blade.php ENDPATH**/ ?>