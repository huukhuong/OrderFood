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
        @if(session('success'))
            <div class="cart-page-heading" style="background: #00b44e; margin-bottom: 10px; display: inline-block">
                <p>
                    {!! Session::get('success') !!}
                </p>
            </div>
        @endif
            @if(session('fail'))
                <div class="cart-page-heading" style="background: #ff5c0f; margin-bottom: 10px; display: inline-block">
                    <p>
                        {!! Session::get('fail') !!}
                    </p>
                </div>
            @endif
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
            @php
                $sum = 0;
            @endphp

            @if ( Session::get('cart') != null)
                <div class="cart-page-content">
                @foreach ($products as $key => $item)
                    <div class="row">
                        <div class="cart-checkbox">
                             <input type="checkbox" name="deleteCarts[]" id="{{ $item['id'] }}">
                        </div>
                        <div class="cart-product">
                            <span>
                                <img src="img/products/{{ $item['image'] }}" alt="">
                                <p>{{ $item['name'] }}</p>
                            </span>
                        </div>
                        <div class="cart-price">
                            <p>{{ number_format($item['price']) }}₫</p>
                        </div>
                        <form action="updatecart" method="post" style="margin: auto">
                            <div class="cart-quantity">
                                @csrf
                                <input type="hidden" value="{{ $item['id'] }}" name="idUpdate">
                                <input type="number" name="quantityUpdate" id=""  value="{{ $item['quantity'] }}">
                                <button type="submit" class="btn btn-secondary"  value="Sửa">
                                    Sửa
                                </button>
                                <a href="deletecart/{{ $item['id']}}" class="btn btn-danger">
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
                            <p>{{ number_format($item['price'] * $item['quantity']) }}₫</p>
                        </div>

                    </div>
                @endforeach
                </div>
            @else
                <div class="alert alert-danger alerted align-content-center justify-content-center">
                    Bạn chưa có sản phẩm nào trong giỏ hàng
                </div>
            @endif

        <div class="cart-footer">
                <button type="submit" class="btn btn-secondary">Xoá</button>
            @if (Session::has('cart') && $sum > 0)
            <h3>Tổng thanh toán: <span>{{ number_format($sum) }}₫</span></h3>
                <a href="order">
                    <button class="btn btn-primary">Đặt hàng</button>
                </a>
            @else
                <h3>Tổng thanh toán: <span> 0₫</span></h3>
                <a href="order" style="pointer-events: none; cursor: default;">
                    <button class="btn btn-primary">Đặt hàng</button>
                </a>
            @endif

        </div>
            <h3 style="padding: 10px 0px 10px 0px">Lịch sử đặt hàng: </h3>
            @if(Auth::user() && $order != null)
                    @php
                    $stt = 0;
                    @endphp
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
                            {{--@php
                            dd($order);
                            @endphp--}}
                            @foreach ($order as $key => $item)
                            <tr class="history-order_row">
                                <th scope="row">{{++$stt}}</th>
                                <td class="history-order_cell">{{$item['id']}}</td>
                                <td class="history-order_cell">{{$item['address']}}</td>
                                <td class="history-order_cell">{{$item['created_at']}}</td>
                                <td class="history-order_cell">{{$item['description']}}</td>
                                <td class="history-order_cell">{{$item['total']}}</td>
                                <td class="history-order_cell">
                                    @if($item['status'] == 0)
                                        Đang đợi quán xác nhận
                                    @elseif($item['status'] == 1)
                                        Đang chuẩn bị
                                    @elseif($item['status'] == 2)
                                        Đang giao hàng
                                    @elseif($item['status'] == 3)
                                        Đã giao hàng
                                    @elseif($item['status'] == 4)
                                        Đã nhận được hàng
                                    @elseif($item['status'] == -1)
                                        Đơn hàng bị huỷ
                                    @endif
                                </td>
                                <td class="history-order_cell">
                                    @if($item['status'] == 0 || $item['status'] == 1)
                                        <button class="btn btn-info" onclick="ctdh({{$item['id']}})">CTĐH</button>
                                        <button class="btn btn-secondary" onclick="huydon({{$item['id']}})">Huỷ</button>
                                    @else
                                        <button class="btn btn-info" onclick="ctdh({{$item['id']}})" >CTĐH</button>
                                        <button class="btn btn-danger" >Mua lại</button>
                                    @endif
{{--                                    <button class="btn btn-info" onclick="ctdh({{$item['id']}})">CTĐH</button>--}}
{{--                                    <button class="btn btn-secondary" disabled>Huỷ</button>--}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <!--Table body-->


                        </table>
                        <!--Table-->
                    </div>
            @else
                        <div class="alert alert-danger alerted align-content-center justify-content-center">
                            Bạn chưa có lịch sử mua hàng nào
                        </div>
            @endif


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

@endsection
