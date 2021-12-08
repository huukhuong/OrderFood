<?php $__env->startSection('title'); ?>
    <title>Trang chủ</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- ====   Banner  ==== -->
    <div class="banner">
        <div class="content">
            <h1>Giao hàng tận nơi <span>với</span></h1>
            <h1> Mức giá siêu ưu đãi !</h1>
            <h4>Tìm kiếm các loại đồ ăn, thức uống nhanh chống, dễ dàng.</h4>
            <form action="">
                <div class="search-box">
                    <input type="search" name="" id="" placeholder="Tìm loại  đồ ăn, thức uống...">
                    <button class="btn btn-secondary ">Tìm kiếm</button>
                </div>
            </form>
            <a href="shop" class="btn btn-primary">Xem cửa hàng<i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

    <!-- --------------xx------------------- -->
    <!-- ====    New Menu    ==== -->
    <section class="new-menu">
        <div class="title-box">
            <h1 class="title-line">
                <span>Thực đơn mới</span>
            </h1>
            <p>Cập nhật thực đơn thường xuyên để đáp ứng nhu cầu của khách hàng</p>
        </div>
        <div class="carousel">
            <div class="owl-carousel owl-theme">
                <?php $__currentLoopData = $products_newest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item card-product">
                        <a href="product_detail/<?php echo e($key->id); ?>">
                            <img src="img/products/<?php echo e($key->image); ?>" alt="">
                        </a>
                        <div class="title">
                            <h3><?php echo e($key->name); ?></h3>
                            <p><?php echo e($key->price); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- ---------------xx------------------ -->
    <!-- ====   Banner 2    ==== -->
    <section class="banner-2">
        <div class="content">
            <h3>Tuần lễ khai trương</h3>
            <h1>Giảm lên đến 50% <br>cho các đơn hàng đầu tiên</h1>
            <small>Từ 00:00h ngày 01/12/2021 đến 23:00h ngày 07/12/2021 </small>
            <p>Giảm 50% cho các đơn hàng dưới 150k và 30% cho tất cả các đơn hàng trên 150k.</p>
            <a href="#" class="btn btn-primary">Đặt hàng ngay</a>
        </div>
    </section>
    <!-- ----------------xx------------------- -->
    <!-- ====   Menu List   ==== -->
    <section class="menu-list">
        <div class="title-box">
            <h1 class="title-line">
                <span>Danh sách món</span>
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
        <div class="see-more">
            <a href="shop">
                <button class="btn btn-primary">Xem cửa hàng<i class="fas fa-arrow-right"></i></button>
            </a>
        </div>
    </section>
    <!-- ------------------------xx------------------- -->
    <!-- ====   Category description    ==== -->

    <section class="category-introduce food-introduce">
        <div class="box">
            <div class="box-content">
                <h2>Thức ăn</h2>
                <p>&emsp; &emsp;Ẩm thực Âu - Mỹ lâu nay vẫn từng hấp dẫn nhiều tín đồ yêu thích ẩm thực bởi sự đa dạng trong
                    nguyên liệu, đậm đà với vị sốt nhiều khẩu vị, cũng như màu sắc bắt mắt. Đặc biệt là với các thể loại món
                    thức ăn nhanh như Pizza,
                    Burger… được phủ ngập nhiều loại topping thịt bò, heo, gà, hải sản… khác nhau sẵn sàng cho một bữa tiệc
                    siêu chill tại gia. Lớp đế được làm nóng hổi, giòn thơm mùi vỏ bánh, được xếp đặt ngập ngụa topping
                    tương xứng với lớp sốt đi kèm,
                    còn gì thích hơn cắn một miếng sẽ cảm nhận được từng tầng mùi thơm quyến luyến quyện với khẩu vị độc đáo
                    phù hợp tay nghề của người làm bếp.<br><br> &emsp; &emsp;Lên kèo hẹn cạ cứng tại nhà, bật ngay ứng dụng
                    FastFoodđể sẵn sàng đại
                    tiệc thật ngon. Với danh sách các cửa hàng món Âu Mỹ thiệt xịn, ứng dụng sẽ giúp bạn tìm ra các cửa hàng
                    cho phép đặt pizza online, order pizza tận nhà, đặt đồ ăn nhanh nhanh chóng mà không phải đi tìm từng
                    địa chỉ trên thanh tìm kiếm.</p>
                <a href="shop">
                    <button class="btn btn-primary">Vào cửa hàng</button>
                </a>
            </div>
            <div class="box-img">
                <img src="client/images/food-introduce.jpg" alt="">
            </div>
        </div>
    </section>
    <section class="category-introduce drink-introduce">
        <div class="box">

            <div class="box-img">
                <img src="client/images/drink-introduce.jpg" alt="">
            </div>
            <div class="box-content">
                <h2>Đồ uống và Tráng miệng</h2>
                <p>&emsp;&emsp;Không còn gì tuyệt bằng việc tự thưởng cho bản thân tận hưởng hương vị ngon lành: trà sữa,
                    sinh tố hay cafe… để nạp lại năng lượng sau khi kết thúc một ngày làm việc vất vả. Tuy nhiên, đôi khi vì
                    lịch trình làm việc bận rộn,
                    người dùng đã quen với việc sử dụng các ứng dụng giao đặt nước online để tiết kiệm thời gian mà vẫn khám
                    phá được một món ngon lành thông qua. Trong đó, ứng dụng FastFood ngoài việc có các bộ lọc khác nhau còn
                    đi kèm nhiều ưu đãi.<br><br> &emsp; &emsp; Ở nhà thưởng thức cả thế giới tráng miệng đa dạng chưa bao
                    giờ dễ hơn ở thời điểm hiện tại với các tín đồ yêu thích ẩm thực. Thậm chí ở hiện tại, tráng miệng không
                    chỉ được dùng sau bữa ăn chính như thói quen ngày xưa
                    của nhiều gia đình, hay là đặt xôi chè trong các dịp lễ giỗ ở nhà, mà còn là các món bánh hay các món
                    salad, kem,… sẵn sàng mời gọi mọi lúc. Thèm gì có đó, chỉ cần ở ngay tại nhà thông qua Internet, việc
                    đặt món tráng miệng, các món
                    dessert hay các món đồ ăn nhà làm, từ bình dân đến cao cấp đều dễ dàng tìm thấy được. </p>
                <a href="shop">
                    <button class="btn btn-primary">Vào cửa hàng</button>
                </a>
            </div>
        </div>
    </section>

    <!-- ---------------xx---------------- -->
    <!-- ====   Banner lazy     ==== -->
    <section class="banner-lazy">
        <div class="box">
            <div class="box-img">
                <img src="client/images/banner-3.jpg" alt="">
            </div>
            <div class="box-content">
                <h2>Pizza tươi ngon, đậm đà hương vị</h2>
                <p>Phục vụ những chiếc bánh pizza lò củi đúng chuẩn Napoli ngon tuyệt và những món ăn phong vị Ý được lấy
                    cảm hứng từ truyền thống hơn 200 năm.</p>
                <img src="client/images/pizza-logo.png   " alt="">
            </div>
        </div>
    </section>

    <!-- --------------xx---------------- -->
    <!-- ====   Service    ==== -->
    <section class="service">
        <div class="box">
            <div class="card">
                <div class="card-img">
                    <img src="client/images/how_1.png" alt="">
                </div>
                <div class="card-content">
                    <h3>Đặt hàng đơn giản</h3>
                    <p>Truy cập vào website, chọn món ăn bạn muốn sau đó bấm thanh toán, chúng tôi sẽ giao đến tận nơi cho
                        bạn.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="client/images/how_2.png" alt="">
                </div>
                <div class="card-content">
                    <h3>Đặt hàng đơn giản</h3>
                    <p>Truy cập vào website, chọn món ăn bạn muốn sau đó bấm thanh toán, chúng tôi sẽ giao đến tận nơi cho
                        bạn.</p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="card">
                <div class="card-img">
                    <img src="client/images/how_3.png" alt="">
                </div>
                <div class="card-content">
                    <h3>Đặt hàng đơn giản</h3>
                    <p>Truy cập vào website, chọn món ăn bạn muốn sau đó bấm thanh toán, chúng tôi sẽ giao đến tận nơi cho
                        bạn.</p>
                </div>
            </div>
        </div>

        <div class="service-description">
            <div class="box">
                <h2>Đặt hàng ngay</h2>
                <p>Trải nghiệm ẩm thực với đa dạng các món ăn đặc trưng vùng miền đầy sáng tạo luôn là trải nghiệm thú vị
                    với tất cả thực khách ở các thành phố lớn. Tuy nhiên, vì nhịp sống bận rộn, nhiều người đã lựa chọn các
                    app đặt đồ ăn online để giúp
                    cho việc tận hưởng bữa ăn ngon thêm dễ dàng hơn rất nhiều. Đi kèm với các ưu đãi như miễn phí ship,
                    khuyến mãi cho người dùng mới… FastFood với nhiều lựa chọn cửa hàng ở 16 tỉnh thành đang trở thành ứng
                    dụng tiện ích giao đồ ăn nhanh
                    chóng.
                </p>
                <a href="shop">
                    <button class="btn btn-primary">Xem thêm</button>
                </a>
            </div>
        </div>
    </section>
    <!-- ---------xx--------------- -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/home.blade.php ENDPATH**/ ?>