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
                <a href="/">Trang chủ</a>
                <i class="fas fa-angle-right"></i>
                <a href="cart">Giỏ hàng</a>
                <i class="fas fa-angle-right"></i>
                <a href="cart_details">Chi tiết đơn hàng</a>
            </span>
        </div>
    </section>
    <!-- ====   Cart    ==== -->

    <section class="cart-page">
        @if(session('success'))
            <div class="cart-page-heading" style="background: #00b44e; margin-bottom: 10px; display: inline-block">
                <p>
                    {!! \Session::get('success') !!}
                </p>
            </div>
        @endif
            @if(session('fail'))
                <div class="cart-page-heading" style="background: #ff5c0f; margin-bottom: 10px; display: inline-block">
                    <p>
                        {!! \Session::get('fail') !!}
                    </p>
                </div>
            @endif
        <div class="cart-page-heading">
            <div class="cart-checkbox">
{{--                 <input type="checkbox" name="select-all" id="select-all" onclick="toggle(this);">--}}
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
            @php
                $sum = 0;
            @endphp
                <div class="cart-page-content">
                @foreach ($orderdetails as $key)
                    <div class="row">
                        <div class="cart-checkbox">
{{--                             <input type="checkbox" name="deleteCarts[]" id="{{$key -> order_id }}">--}}
                        </div>
                        <div class="cart-product">
                            <span>
                                <img src="img/products/{{ $key -> products_linked ->image}}" alt="">
                                <p>{{$key -> products_linked -> name}}</p>
                            </span>
                        </div>
                        <div class="cart-price">
                            <p>{{ number_format($key -> price) }}₫</p>
                        </div>
                        <div class="cart-total">
                            <p>{{ number_format($key -> amount) }}</p>
                        </div>
                        <div class="cart-total">
                            <p>{{ number_format($key -> price) }}</p>

                        </div>


                    </div>
                @endforeach
                </div>

        <div class="cart-footer">
            <button type="submit" class="btn btn-secondary" onclick="history.back()">Quay lại</button>
            <h3 ><span></span></h3>
            <h3 >Tổng thanh toán: <span>{{ number_format($order -> total)}}₫</span></h3>
        </div>


    </section>

    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
    <!-- --------xx--------- -->

@endsection
