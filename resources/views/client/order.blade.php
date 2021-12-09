@extends('client.main')

@section('title')
    <title>Đặt hàng</title>
@endsection

@section('content')
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
                    <form action="order_success">
                        <div class="form-group">
                            <label for="">Tên người đặt hàng</label>
                            <input type="hidden" name="id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="total" value="0">
                            <input type="text" name="name" value="{{ auth()->user() ->name}} ">
                        </div>
                        <div class="form-group">
                            <label for="">Điện thoại</label>
                            <input type="text" name="phone" value="{{ auth()->user() ->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ</label>
                            <input type="text" name="address" value="{{ auth()->user() ->address}}">
                        </div>
                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <textarea name="description" cols="30" rows="5">{{ old('description') }}</textarea>
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
                        @if(Session::has('cart'))
                            @php
                                $sum = 0;
                            @endphp
                            @foreach($products as $key => $item)
                                <div class="item">
                                    <span>{{$item['quantity']}} x {{$item['name']}} </span>
                                    <span>{{number_format($item['quantity'] * $item['price'],0)}}₫</span>
                                </div>
                                @php
                                    $sum += $item['quantity'] * $item['price'];
                                @endphp

                            @endforeach
                        @endif

                    </div>
                    <p>Thanh toán khi nhận hàng</p>
                    <div class="total">
                        <span>Tổng cộng:</span>
                        <strong> @php
                                echo number_format($sum ,0);
                            @endphp₫</strong>
                    </div>
                    <a href="order_success">
                        <button class="btn btn-primary">Đặt hàng</button>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
