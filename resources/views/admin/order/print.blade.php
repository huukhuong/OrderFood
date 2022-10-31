<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoá đơn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container p-5 align-items-center" id="print">
    <div class="row">
        <div class="col-12 card border-0">
            <h2 class="text-center text-uppercase">Hoá đơn</h2>
        </div>
        <div class="col-12 justify-content-center d-flex mb-3">
            <span style="width: 250px; border-top: 2px solid black;border-bottom: 2px solid black; display: flex"></span>
        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Mã khách hàng</div>
             <span>: {{ $order->id }}</span>
        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Tên</div>
            <span>: {{ $order->user_linked->name }}</span>

        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Số điện thoại</div>
            <span>: {{ $order->phone }}</span>

        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Địa chỉ</div>
             <span>: {{ $order->address }}</span>

        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Ghi chú</div>
             <span>: {{ $order->description }}</span>

        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Thời gian</div>
             <span>: {{ $order->created_at }}</span>

        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Tổng tiền</div>
             <span>: {{ $order->total }}</span>

        </div>
        <div class="col-6 d-flex">
            <div style="min-width: 130px">Nhân viên</div>
             <span>: {{auth()->user()->name}}</span>

        </div>
        <div class="col-12">
            <div style="font-weight: bold"> Thông tin đơn hàng </div>
            <div class="table-responsive">
                <table id="example1" class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>

                        <th class="text-center">Tên Sản phẩm</th>
                        <th class="text-center" style="width: 100px">Số lượng</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orderdetails as $key)
                        <tr>
                            <td class="text-center">{{ $key->order_id }}</td>
                            <td>{{ $key->products_linked->name }}</td>
                            <td>{{ $key->amount }}</td>
                            <td style="text-align: right">{{ number_format($key->price, 0) }}₫</td>
                            <td style="text-align: right">{{ number_format($key->price * $key->amount, 0) }}₫</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <h3 style="text-align: right; font-size: 20px">Tổng tiền : {{ number_format($order->total )}}₫</h3>
</div>
{{--<button onclick="myprint()">Print this page</button>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script type="text/javascript">
        window.print();
</script>
</body>
</html>
