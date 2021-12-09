@extends('client.main')

@section('title')
    <title>Giỏ hàng</title>
@endsection

@section('content')

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
            @if(Session::has('cart'))
                @php
                    $sum = 0;
                @endphp
                @foreach($products as $key => $item)

                        <div class="row">
                            <div class="cart-checkbox">
                                <input type="checkbox" name="" id="">
                            </div>
                            <div class="cart-product">
                    <span>
                        <img src="img/products/{{$item['image']}}" alt="">
                        <p>{{$item['name']}}</p>
                    </span>
                            </div>
                            <div class="cart-price">
                                <p>{{$item['price']}}₫</p>
                            </div>
                            <form action="updatecart" method="post">
                                <div class="cart-quantity">
                                    @csrf
                                    <input type="hidden" value="{{$item['id']}}" name="idUpdate">
                                    <input type="number" name="quantityUpdate" id="" value="{{$item['quantity']}}">
                                    <button type="submit" class="btn btn-warning" value="Sửa">
                                        Sửa
                                    </button>
                                    <a href="deletecart/{{$item['id']}}" class="btn btn-danger">
                                        Xoá
                                    </a>
                                </div>

                            </form>
                            <div class="cart-total">
                                @php
                                    $price = $item['price'];
                                    $quantity = $item['quantity'];
                                    $total_row = $price * $quantity;
                                    $sum += $total_row;
                                @endphp
                                <p>{{$item['price'] * $item['quantity']}}₫</p>
                            </div>

                        </div>


                @endforeach
            @else
            @endif

        </div>

        <div class="cart-footer">
            <button class="btn btn-secondary">Xoá</button>
            <h3>Tổng thanh toán: <span>
                     @php
                       echo  $sum ;
                     @endphp₫</span></h3>
            <a href="order">
                <button class="btn btn-primary">Đặt hàng</button>
            </a>
        </div>
    </section>
    <!-- --------xx--------- -->

@endsection
