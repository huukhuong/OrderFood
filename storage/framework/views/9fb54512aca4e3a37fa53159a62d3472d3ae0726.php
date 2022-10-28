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
                 <input type="checkbox" name="select-all" id="select-all" onclick="toggle(this);">
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

            <?php if( Session::get('cart') != null): ?>
                <div class="cart-page-content">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="cart-checkbox">
                             <input type="checkbox" name="deleteCarts[]" id="<?php echo e($item['id']); ?>">
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
                        <form action="updatecart" method="post" style="margin: auto">
                            <div class="cart-quantity">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($item['id']); ?>" name="idUpdate">
                                <input type="number" name="quantityUpdate" id=""  value="<?php echo e($item['quantity']); ?>">
                                <button type="submit" class="btn btn-secondary"  value="Sửa">
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
                </div>
            <?php else: ?>
                <div class="alert alert-danger alerted align-content-center justify-content-center">
                    Bạn chưa có sản phẩm nào trong giỏ hàng
                </div>
            <?php endif; ?>

        <div class="cart-footer">
                <button type="submit" class="btn btn-secondary">Xoá</button>
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
            <h3 style="padding: 10px 0px 10px 0px">Lịch sử đặt hàng: </h3>
            <?php if(Auth::user() && $order != null): ?>
                    <?php
                    $stt = 0;
                    ?>
                    <div class="table-responsive text-wrap history-order">
                        <!--Table-->
                        <table class="table table-striped history-order_table">
                            <!--Table head-->
                            <thead>
                            <tr>
                                <th>#STT</th>
                                <th>Mã đơn</th>
                                <th>Địa chỉ</th>
                                <th>Thời gian tạo</th>
                                <th>Ghi Chú</th>
                                <th>Tổng cộng</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                            
                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="history-order_row">
                                <th scope="row"><?php echo e(++$stt); ?></th>
                                <td class="history-order_cell"><?php echo e($item['id']); ?></td>
                                <td class="history-order_cell"><?php echo e($item['address']); ?></td>
                                <td class="history-order_cell"><?php echo e($item['created_at']); ?></td>
                                <td class="history-order_cell"><?php echo e($item['description']); ?></td>
                                <td class="history-order_cell"><?php echo e($item['total']); ?></td>
                                <td class="history-order_cell">
                                    <?php if($item['status'] == 0): ?>
                                        Đang đợi quán xác nhận
                                    <?php elseif($item['status'] == 1): ?>
                                        Đang chuẩn bị
                                    <?php elseif($item['status'] == 2): ?>
                                        Đang giao hàng
                                    <?php elseif($item['status'] == 3): ?>
                                        Đã giao hàng
                                    <?php elseif($item['status'] == 4): ?>
                                        Đã nhận được hàng
                                    <?php elseif($item['status'] == -1): ?>
                                        Đơn hàng bị huỷ
                                    <?php endif; ?>
                                </td>
                                <td class="history-order_cell">
                                    <?php if($item['status'] == 0 || $item['status'] == 1): ?>
                                        <button class="btn btn-info" onclick="ctdh(<?php echo e($item['id']); ?>)">CTĐH</button>
                                        <button class="btn btn-secondary" onclick="huydon(<?php echo e($item['id']); ?>)">Huỷ</button>
                                    <?php else: ?>
                                        <button class="btn btn-info" onclick="ctdh(<?php echo e($item['id']); ?>)" >CTĐH</button>
                                        <button class="btn btn-danger" >Mua lại</button>
                                    <?php endif; ?>


                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <!--Table body-->


                        </table>
                        <!--Table-->
                    </div>
            <?php else: ?>
                        <div class="alert alert-danger alerted align-content-center justify-content-center">
                            Bạn chưa có lịch sử mua hàng nào
                        </div>
            <?php endif; ?>


    </section>

    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
        function ctdh(id){
            window.location.href = "cart_details/" +id;
        }
        function huydon(id){
            window.location.href = "orderCancel/" +id;
        }
    </script>
    <!-- --------xx--------- -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Desktop\CodeNam4\OrderFood\resources\views/client/cart.blade.php ENDPATH**/ ?>