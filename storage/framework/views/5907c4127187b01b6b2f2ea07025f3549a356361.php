<?php $__env->startSection('title'); ?>
    <title>Chi tiết <?php echo e($product->name); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ---------------xx-------------- -->
    <section class="page-heading">
        <div class="content">
            <h2>Chi tiết sản phẩm</h2>
            <span>
                <i class="fas fa-home"></i>
                <a href="/">Trang chủ</a>
                <i class="fas fa-angle-right"></i>
                <a href="cart">Giỏ hàng</a>
                <i class="fas fa-angle-right"></i>
                <a href="detail">Chi tiết sản phẩm</a>
            </span>
        </div>
    </section>
    <!-- ====   Cart    ==== -->
    <section class="detail-page">
        <div class="box">
            <div class="image-box">
                <img src="img/products/<?php echo e($product->image); ?>" alt="">
            </div>
            <div class="content">
                <h2><?php echo e($product->name); ?></h2>
                <p class="price">Giá: <span><?php echo e(number_format($product->price, 0)); ?> ₫</span></p>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="quantity">
                    <button>-</button>
                    <input type="number" value="1">
                    <button>+</button>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="description">
                <h2>Mô tả sản phẩm</h2>
                <p><?php echo e($product->description); ?></p>
            </div>
        </div>
    </section>

    <!-- ====   Menu List   ==== -->
    <section class="menu-list">
        <div class="title-box">
            <h1 class="title-line">
                <span>Sản phẩm gợi ý</span>
            </h1>
        </div>
        <div class="list-products">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card-product">
                    <a href="product_detail/<?php echo e($key->id); ?>">
                        <img src="img/products/<?php echo e($key->image); ?>" alt="">
                    </a>
                    <h4><?php echo e($key->name); ?></h4>
                    <div>
                        <p class="price">Giá: <?php echo e(number_format($key->price, 0)); ?></p>
                        <span><i class="fas fa-star"></i> 4.5</span>
                    </div>
                    <button class="btn btn-secondary">
                        <a href="#" style="text-decoration: none; color: white">
                            <i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng
                        </a>
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <!-- --------xx--------- -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\client\product_detail.blade.php ENDPATH**/ ?>