<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<div class="container p-5 align-items-center" id="print">
    <div class="card">
        <div class="card-header bg-danger"> Hoá Đơn</div>
    </div>
    <div class="p-1">
        Mã khách hàng : {{ $order->id }}
    </div>
    <div class="p-1">
        Tên : {{ $order->user_linked->name }}
    </div>
    <div class="p-1">
        Số điện thoại : {{ $order->phone }}
    </div>
    <div class="p-1">
        Địa chỉ : {{ $order->address }}
    </div>
    <div class="p-1">
        Ghi chú : {{ $order->description }}
    </div>
    <div class="p-1">
        Thời gian : {{ $order->created_at }}
    </div>
    <div class="p-1">
        Tổng tiền : {{ $order->total }}
    </div>
    <div class="p-1">
        Nhân Viên : {{auth()->user()->name}}
    </div>
    <div class="card">
        <div class="card-header bg-gray"> Thông tin đơn hàng </div>
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
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
                        <td>{{ number_format($key->price, 0) }}</td>
                        <td>{{ number_format($key->price * $key->amount, 0) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <h3>Tổng tiền : {{ $order->total }} vnđ</h3>
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
