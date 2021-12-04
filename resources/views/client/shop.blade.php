@extends('client.main')

@section('title')
    <title>Chọn món ngay</title>
@endsection

@section('content')
    <!-- ---------------xx-------------- -->
    <!-- ====   Search  ==== -->
    <section class="page-heading">
        <div class="slogan">
            <h2>Phục vụ tận tình</h2>
            <p>Đảm bảo chất lượng tốt nhất đến mọi khách hàng</p>
        </div>
        <div class="search-box">
            <form action="">
                <input type="text" placeholder="Tìm kiếm trong cửa hàng">
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
                    <form action="">
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <label for="">Thức ăn</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <label for="">Thức uống</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <label for="">Tráng miệng</label>
                        </div>
                        <button class="btn">Thực hiện</button>
                    </form>
                </div>
            </div>
            <div class="filter-option">
                <div class="filter-option-heading">
                    <h3>Đánh giá</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="filter-option-content">
                    <form action="">
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <label for="">Thức ăn</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <label for="">Thức uống</label>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <label for="">Tráng miệng</label>
                        </div>
                        <button class="btn">Thực hiện</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="shoppage-product">
            <div class="collection">
                <h2>Bộ sưu tập</h2>
                <div class="carousel owl-carousel owl-theme">
                    <div class="item card-product">
                        <img src="client/images/hamburger-bo.jpg" alt="">
                        <div class="title">
                            <h3>Hamburger</h3>
                        </div>
                    </div>

                    <div class="item card-product">
                        <img src="client/images/pizza.jpg" alt="">
                        <div class="title">
                            <h3>Pizza</h3>
                        </div>
                    </div>
                    <div class="item card-product">
                        <img src="client/images/chicken.jpg" alt="">
                        <div class="title">
                            <h3>Gà rán</h3>
                        </div>
                    </div>
                    <div class="item card-product">
                        <img src="client/images/rice.jpg" alt="">
                        <div class="title">
                            <h3>Cơm</h3>
                        </div>
                    </div>
                    <div class="item card-product">
                        <img src="client/images/ice.jpg" alt="">
                        <div class="title">
                            <h3>Kem</h3>
                        </div>
                    </div>
                    <div class="item card-product">
                        <img src="client/images/tea.jpg" alt="">
                        <div class="title">
                            <h3>Trà sữa</h3>
                        </div>
                    </div>
                    <div class="item card-product">
                        <img src="client/images/cake.jpg" alt="">
                        <div class="title">
                            <h3>Bánh ngọt</h3>
                        </div>
                    </div>
                </div>
            </div>
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

                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/buger.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/buger.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/burger-2.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-product">
                        <div class="card-img">
                            <div class="div">
                                <img src="client/images/buger.jpg" alt="">
                            </div>
                            <span><i class="fas fa-star">4.5</i></span>
                        </div>
                        <div class="card-content">
                            <h4>Hamburger Silton</h4>
                            <p class="price">Giá: 50.000</p>
                            <div class="card-btn">
                                <button class="btn btn-secondary"><i class="fas fa-shopping-bag"></i>Thêm vào giỏ
                                    hàng</button>
                                <button class="btn btn-favou"><i class="far fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

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
@endsection
