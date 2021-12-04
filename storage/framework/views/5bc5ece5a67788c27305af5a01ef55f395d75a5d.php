<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Food</title>
    <link rel="shortcut icon" href="client/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="client/css/style.css">
</head>

<body>
    <!-- ====   Navigation  ==== -->
    <header>
        <a href="#" class="logo">
            <img src="client/images/logo.svg" alt="logo">
        </a>
        <ul class="navigation">
            <span id="close-nav"><i class="fas fa-times"></i></span>
            <li><a href="#" class="active">Trang chủ</a></li>
            <li><a href="shop.html">Cửa hàng</a></li>
            <li><a href="coming-soon.html">Hỗ trợ</a></li>
            <li><a href="coming-soon.html">Thông báo</a></li>
            <li class="user" style="display: none;">
                <img src="" alt="img">
                <h3>Join Hiddleston</h3>
            </li>
            <li><a href="register.html">Đăng ký</a></li>
            <li><a href="login.html">Đăng nhập</a></li>

        </ul>

        <div class="icon">
            <a href="cart.html">
                <div class="cart">
                    <svg xmlns="http://www.w3.org/2000/svg" width="142.25" height="189.333" viewBox="0 0 142.25 189.333">
                            <g id="shopping-bag-svgrepo-com" transform="translate(-55.3 -1.5)">
                            <path id="Path_9" data-name="Path 9" d="M190.014,162.8l-10.1-121.435a5,5,0,0,0-4.836-4.737H154.286C154,16.368,138.48,0,119.425,0S84.852,16.368,84.564,36.627H63.777a4.974,4.974,0,0,0-4.836,4.737L48.836,162.8c0,.154-.036.308-.036.462,0,13.827,11.873,25.073,26.489,25.073h88.272c14.616,0,26.489-11.246,26.489-25.073A2,2,0,0,0,190.014,162.8ZM119.425,10.4c13.678,0,24.829,11.708,25.118,26.228H94.308C94.6,22.107,105.747,10.4,119.425,10.4Zm44.136,167.536H75.289c-9.166,0-16.6-6.47-16.745-14.443L68.216,47.064H84.528V62.855a4.882,4.882,0,1,0,9.744,0V47.064h50.271V62.855a4.882,4.882,0,1,0,9.744,0V47.064H170.6l9.708,116.428C180.162,171.464,172.692,177.935,163.561,177.935Z" transform="translate(7 2)" fill="#fff" stroke="#fff" stroke-width="3"/>
                            </g>
                        </svg>
                    <span>1</span>
                </div>
            </a>
            <span id="navbar-toggler">
                <i class="fas fa-stream"></i>
            </span>
        </div>

    </header>
    <!-- ---------------xx-------------- -->
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
            <a href="#" class="btn btn-primary">Xem cửa hàng<i class="fas fa-arrow-right"></i></a>
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

                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>
                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>
                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>
                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>
                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>
                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>
                <div class="item card-product">
                    <img src="client/images/buger.jpg" alt="">
                    <div class="title">
                        <h3>Hamburger bò phô mai</h3>
                        <p>Giá: 20.000</p>
                    </div>
                </div>

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
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>

            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary" id="45"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
            <div class="card-product">
                <img src="client/images/burger-2.jpg" alt="">
                <h4>Hamburger Silton</h4>
                <div>
                    <p class="price">Giá: 50.000</p>
                    <span><i class="fas fa-star"></i> 4.5</span>
                </div>
                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ hàng</button>
            </div>
        </div>
        <div class="see-more">
            <a href="#">
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
                <p>&emsp; &emsp;Ẩm thực Âu - Mỹ lâu nay vẫn từng hấp dẫn nhiều tín đồ yêu thích ẩm thực bởi sự đa dạng trong nguyên liệu, đậm đà với vị sốt nhiều khẩu vị, cũng như màu sắc bắt mắt. Đặc biệt là với các thể loại món thức ăn nhanh như Pizza,
                    Burger… được phủ ngập nhiều loại topping thịt bò, heo, gà, hải sản… khác nhau sẵn sàng cho một bữa tiệc siêu chill tại gia. Lớp đế được làm nóng hổi, giòn thơm mùi vỏ bánh, được xếp đặt ngập ngụa topping tương xứng với lớp sốt đi kèm,
                    còn gì thích hơn cắn một miếng sẽ cảm nhận được từng tầng mùi thơm quyến luyến quyện với khẩu vị độc đáo phù hợp tay nghề của người làm bếp.<br><br> &emsp; &emsp;Lên kèo hẹn cạ cứng tại nhà, bật ngay ứng dụng FastFoodđể sẵn sàng đại
                    tiệc thật ngon. Với danh sách các cửa hàng món Âu Mỹ thiệt xịn, ứng dụng sẽ giúp bạn tìm ra các cửa hàng cho phép đặt pizza online, order pizza tận nhà, đặt đồ ăn nhanh nhanh chóng mà không phải đi tìm từng địa chỉ trên thanh tìm kiếm.</p>
                <a href="#">
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
                <p>&emsp;&emsp;Không còn gì tuyệt bằng việc tự thưởng cho bản thân tận hưởng hương vị ngon lành: trà sữa, sinh tố hay cafe… để nạp lại năng lượng sau khi kết thúc một ngày làm việc vất vả. Tuy nhiên, đôi khi vì lịch trình làm việc bận rộn,
                    người dùng đã quen với việc sử dụng các ứng dụng giao đặt nước online để tiết kiệm thời gian mà vẫn khám phá được một món ngon lành thông qua. Trong đó, ứng dụng FastFood ngoài việc có các bộ lọc khác nhau còn đi kèm nhiều ưu đãi.<br><br>                    &emsp; &emsp; Ở nhà thưởng thức cả thế giới tráng miệng đa dạng chưa bao giờ dễ hơn ở thời điểm hiện tại với các tín đồ yêu thích ẩm thực. Thậm chí ở hiện tại, tráng miệng không chỉ được dùng sau bữa ăn chính như thói quen ngày xưa
                    của nhiều gia đình, hay là đặt xôi chè trong các dịp lễ giỗ ở nhà, mà còn là các món bánh hay các món salad, kem,… sẵn sàng mời gọi mọi lúc. Thèm gì có đó, chỉ cần ở ngay tại nhà thông qua Internet, việc đặt món tráng miệng, các món
                    dessert hay các món đồ ăn nhà làm, từ bình dân đến cao cấp đều dễ dàng tìm thấy được. </p>
                <a href="#">
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
                <p>Phục vụ những chiếc bánh pizza lò củi đúng chuẩn Napoli ngon tuyệt và những món ăn phong vị Ý được lấy cảm hứng từ truyền thống hơn 200 năm.</p>
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
                    <p>Truy cập vào website, chọn món ăn bạn muốn sau đó bấm thanh toán, chúng tôi sẽ giao đến tận nơi cho bạn.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="client/images/how_2.png" alt="">
                </div>
                <div class="card-content">
                    <h3>Đặt hàng đơn giản</h3>
                    <p>Truy cập vào website, chọn món ăn bạn muốn sau đó bấm thanh toán, chúng tôi sẽ giao đến tận nơi cho bạn.</p>
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
                    <p>Truy cập vào website, chọn món ăn bạn muốn sau đó bấm thanh toán, chúng tôi sẽ giao đến tận nơi cho bạn.</p>
                </div>
            </div>
        </div>

        <div class="service-description">
            <div class="box">
                <h2>Đặt hàng ngay</h2>
                <p>Trải nghiệm ẩm thực với đa dạng các món ăn đặc trưng vùng miền đầy sáng tạo luôn là trải nghiệm thú vị với tất cả thực khách ở các thành phố lớn. Tuy nhiên, vì nhịp sống bận rộn, nhiều người đã lựa chọn các app đặt đồ ăn online để giúp
                    cho việc tận hưởng bữa ăn ngon thêm dễ dàng hơn rất nhiều. Đi kèm với các ưu đãi như miễn phí ship, khuyến mãi cho người dùng mới… FastFood với nhiều lựa chọn cửa hàng ở 16 tỉnh thành đang trở thành ứng dụng tiện ích giao đồ ăn nhanh
                    chóng.
                </p>
                <a href="#">
                    <button class="btn btn-primary">Xem thêm</button>
                </a>
            </div>
        </div>
    </section>
    <!-- ---------xx--------------- -->
    <!-- ====   Footer  ==== -->
    <footer class="footer">
        <div class="box">
            <div class="openning-hour">
                <h2>Giờ mở cửa</h2>
                <ul>
                    <li>
                        <span>Thứ hai - Thứ sáu</span>
                        <span>08:30 - 23:00h</span>
                    </li>
                    <li>
                        <span>Thứ bảy</span>
                        <span>07:00 - 23:00h</span>
                    </li>
                    <li>
                        <span>Chủ nhật</span>
                        <span>07:00 - 23:00h</span>
                    </li>
                </ul>
            </div>
            <div class="address">
                <h2>Địa chỉ</h2>
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <p>273 An D. Vương, Phường 3, Quận 5,Thành phố Hồ Chí Minh, Việt Nam</p>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <p>0123 456 789</p>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <p>infor@domain.com</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669658423672!2d106.68006961411632!3d10.75992236244198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1637559140172!5m2!1svi!2s" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="box">
            <div class="subscribe">
                <h2>Đăng ký ngay</h2>
                <p>Đăng ký ngay để nhận các bản cập nhật mới của chúng tôi và nhận các ưu đãi và nội dung thường xuyên.</p>
                <div class="textfield">
                    <input type="email" placeholder="Địa chỉ mail của bạn">
                    <button class="btn btn-primary">Đăng ký</button>
                </div>
            </div>

            <div class="social">
                <h2>Kết nối với chúng tôi</h2>
                 <div class="list-item">
                    <a href="#"><div class="item"><i class="fab fa-facebook-f"></i></div></a>
                    <a href="#"><div class="item"><i class="fab fa-instagram"></i></div></a>
                    <a href="#"><div class="item"><i class="fab fa-twitter"></i></div></a>
                    <a href="#"><div class="item"><i class="fab fa-google-plus-g"></i></div></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- -----------xx--------------- -->

    <!-- ====   Product details     ==== -->
    <section class="product-details" >
         <div class="card" id="card-detail">
           <div class="card-front">
                <div class="close-btn">
                    <i class="fas fa-times"></i>
                </div>
                <div class="card-content">
                    <div class="card-img">
                        <img src="client/images/buger.jpg" alt="">
                    </div>
                    <div class="card-detail">
                        <h2>Bánh burger thịt cừu với gia vị Ấn độ và nước sốt ya-ua vị bạc hà</h2>
                        <p>Giá: <span>50.000 đ</span></p>
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
        <div class="add-to-cart">
            <button class="btn btn-primary"><i class="fas fa-shopping-bag"></i>Thêm</button>
            <button class="btn btn-secondary" id="description-btn">Mô tả</button>
        </div>

        </div>
        <div class="card-back">
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>
            <div class="card-content">
                <h3>Mô tả sản phẩm</h3>
                <h2>Bánh burger thịt cừu với gia vị Ấn độ và nước sốt ya-ua vị bạc hà</h2>
                <p>&emsp; &emsp;Phần nhân bánh được chế biến từ thịt cừu chăn nuôi ngoài đồng, loại thịt nạc vai chứa 2/3 lượng mỡ ít hơn thịt cừu nuôi siêu thịt. Để thịt ngon hơn thì nên xay nó nhỏ hơn trước khi chế biến. Thịt sau khi xay được tẩm ướp vadouvan,
                    loại gia vị hỗn hợp của Ấn Độ được sử dụng nhiều trong việc tẩm ướp thịt nướng. Gia vị này kết hợp từ bột cà ri, thêm tỏi, hành khô. <br>&emsp; &emsp;Cuối cùng, một ít nước sốt ya-ua vị bạc hà, ít vị ngọt của ớt đỏ nướng và vị đắng
                    của radicchio ở xung quanh sẽ đem đến một bánh burger đầy mùi vị.</p>
            </div>
            <div class="add-to-cart">
                <button class="btn btn-secondary" id="back-btn">Quay lại</button>
            </div>
        </div>
        </div>
        </section>
        <!-- -----------xx------------------ -->

        <div class="coppyright">
            <p>copyright © 2021 <span>Fast Food.</span> All rights reserved.</p>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="client/js/main.js"></script>
</body>

</html>

</html>
<?php /**PATH C:\xampp\htdocs\OrderFood\resources\views/client/welcome.blade.php ENDPATH**/ ?>