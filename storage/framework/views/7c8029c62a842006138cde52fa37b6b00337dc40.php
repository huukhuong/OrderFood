

<?php $__env->startSection('title'); ?>
    <title>Chọn món ngay</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ---------------xx-------------- -->
    <!-- ====   Search  ==== -->
    <section class="page-heading">
        <div class="slogan">
            <h2>Phục vụ tận tình</h2>
            <p>Đảm bảo chất lượng tốt nhất đến mọi khách hàng</p>
        </div>
        <div class="search-box">
            <form action="search" method="post" >
                <?php echo csrf_field(); ?>
                <input type="text"  name="keyword" placeholder="Tìm kiếm trong cửa hàng">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
    </section>
    <!-- ----------xx------- -->
    <!-- ====   Product ==== -->
    <section class="shoppage-content">
        <div class="icon">
            <h3>Lọc</h3>
            <span id="filter-toggle"><i class="fas fa-sliders-h"></i></span>
        </div>
        <div class="shoppage-filter">
            <span id="close-filter">
                <i class="fas fa-times"></i>
            </span>
            <h3>Lọc</h3>
            <div class="filter-option ">
                <div class="filter-option-heading active">
                    <h3>Sắp xếp</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="filter-option-content">
                    <form action="">
                        <div class="form-group">
                            <input type="radio" name="" id="">
                            <label for="">Theo tên A <i class="fas fa-long-arrow-alt-right"></i> Z</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="" id="">
                            <label for="">Giá thừ thấp đến cao</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="" id="">
                            <label for="">Giá từ cao đến thấp</label>
                        </div>
                        <button class="btn">Thực hiện</button>
                    </form>
                </div>
            </div>
            <div class="filter-option">
                <div class="filter-option-heading">
                    <h3>Danh mục</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="filter-option-content">
                    <form action="" >
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <input type="checkbox" name="danhmuc" id="danhmuc<?php echo e($key -> id); ?>">
                                <input type="hidden" value="<?php echo e($key -> id); ?>">
                                <label for="danhmuc<?php echo e($key -> id); ?>""><?php echo e($key -> name); ?></label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button class="btn">Thực hiện</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="shoppage-product">

            <div class="shoppage-banner">
                <div class="banner-content">
                    <h3>Đặt hàng ngay để nhận nhiều ưu đãi!</h3>
                    <p>Miễn phí giao hàng cho 3 đơn hàng đầu tiên.</p>
                </div>
                <img src="images/motorbike.png" alt="">
            </div>

            <div class="products">
                <h2>Danh sách sản phẩm</h2>
                <div class="box">
                    <?php $__currentLoopData = $productsearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-product">
                            <div class="card-img">
                                <div class="div">
                                    <img src="./img/products/<?php echo e($key -> image); ?>"/> alt="">
                                </div>
                                <span><i class="fas fa-star">4.5</i></span>
                            </div>
                            <div class="card-content">
                                <h4><?php echo e($key -> name); ?></h4>
                                <p class="price">Giá: <?php echo e(number_format($key -> price,0)); ?></p>
                                <div class="card-btn">
                                    <button class="btn btn-secondary">
                                        <a href="#" style="text-decoration: none; color: white">
                                            <i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                            hàng
                                        </a>
                                    </button>
                                    <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo $productsearch -> links(); ?>

                <div class="pagination">
                    <ul>
                        <li> <a href=""><i class="fas fa-angle-double-left"></i></a></li>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fas fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------xx------- -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views\client\search.blade.php ENDPATH**/ ?>