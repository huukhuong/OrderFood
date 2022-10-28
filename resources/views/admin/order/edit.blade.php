@extends('admin.main')

@section('title')
    <title>Quản lý đơn hàng | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa thông đơn hàng</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('chuacofile'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Chưa thêm file',

                })
            </script>
        @endif
        @if (session('capnhatdonhangthanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Cập nhật trạng thái thành công',
                }).then(function () {

                });
            </script>
        @endif

        <form action="admin/order/edit" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="">Mã </label>
                    <input type="hidden" class="form-control" id="id" name="orderId" placeholder=""
                           value="{{ $order->id }}">
                    <input type="text" class="form-control" id="" name="" placeholder=""
                           value="{{ $order->id }}">
                </div>
                <div class="form-group">
                    <label for="order">Tên khách hàng</label>
                    <input type="hidden" class="form-control" id="order" name="orderIDCustommer" placeholder=""
                           value="{{ $order->user_id}}">
                    <input type="text" class="form-control" id="order" name="" placeholder=""
                           value="{{ $order->user_linked->name }}">
                </div>
                <div class="form-group">

                    <label for="order">Địa chỉ</label>
                    <input type="text" class="form-control" id="order" name="orderAddress" placeholder=""
                           value="{{ $order->address }}">
                </div>
                <div class="form-group">
                    <label for="order">Số điện thoại</label>
                    <input type="text" class="form-control" id="order" name="orderPhone" placeholder=""
                           value="{{ $order->phone }}">
                </div>
                <div class="form-group">
                    <label>Danh sách partners</label>
                    <select class="form-control" name="partnerId">
                        @foreach ($partners as $key)
                            @if ($order ->id_partner == $key->id)
                                <option selected value="{{ $order->id_partner }}"> {{ $key->name }} </option>
                            @else
                                <option value="{{ $key->id }}"> {{ $key->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">Thời gian tạo đơn</label>
                    <input type="text" class="form-control" id="order" name="orderCreated" placeholder=""
                           value="{{ $order->created_at }}">
                </div>
                <div class="form-group">
                    <label for="order">Mô tả</label>
                    <textarea class="form-control" id="order" name="orderDescription" placeholder=""
                    >{{ $order->description }} </textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="orderStatus" {{ $order->status == 0 ? 'disabled' : '' }}>
                        <option  @if ($order->status == -1) selected @endif  value="-1">Đơn hàng bị huỷ</option>
                        <option  @if ($order->status == 0) selected @endif value="0">Đang đợi quán xác nhận</option>
                        <option  @if ($order->status == 1) selected @endif value="1">Đang chuẩn bị</option>
                        <option  @if ($order->status == 2) selected @endif value="2">Đang giao hàng</option>
                        <option  @if ($order->status == 3) selected @endif value="3">Đã giao hàng</option>
                        <option  @if ($order->status == 4) selected @endif value="4">Đã nhận được hàng</option>
{{--                        @if ($order->status == -1)--}}
{{--                            <option selected value="-1">Đơn hàng bị huỷ</option>--}}
{{--                            @elseif ($order->status == 0)--}}
{{--                                <option selected value="0">Đang đợi quán xác nhận</option>--}}
{{--                                @elseif ($order->status == 1)--}}
{{--                                    <option selected value="1">Đang chuẩn bị</option>--}}
{{--                                    @elseif ($order->status == 2)--}}
{{--                                        <option selected value="2">Đang giao hàng</option>--}}
{{--                                        @elseif ($order->status == 3)--}}
{{--                                            <option selected value="3">Đã giao hàng</option>--}}
{{--                                            @elseif ($order->status == 4)--}}
{{--                                                <option selected value="4">Đã nhận được hàng</option>--}}
{{--                                        @endif--}}
{{--                                        </option>--}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">Tổng đơn hàng</label>
                    <input type="number" class="form-control" id="order" name="orderCreated" placeholder="" disabled
                           value="{{ $order->total }}">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                <button type="submit" class="btn btn-primary" {{ $order->status == 0 ? 'disabled' : '' }}>Lưu</button>
            </div>
        </form>

    </div>
    {{--Modal thêm chi tiết đặt hàng--}}
    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" @if($order->status != 1 && $order->status != 0) disabled @endif data-target="#exampleModalCenter">
                Thêm chi tiết đơn hàng
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="admin/orderdetails/add" method="post" id="myform">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã hoá đơn</label>
                                    <input type="text" class="form-control" name="idOrder"   value="{{ $order->id }}" >

                                </div>
                                <input type="hidden" name="application_url" id="application_url" value="{{  url('') }}"/>
                                <div class="form-group">
                                    <label>Danh sách sản phẩm</label>
                                    <select id="sectorSelect"class="form-control sectorSelect" name="productID">
                                        @foreach ($products as $key)
                                            <option value="{{ $key->id }}"> {{ $key->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" class="form-control" name="amount" value="" >

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" name="productPrice" id="productPrice" class="form-control"  value="" >

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                        <script type="text/javascript">
                            $('#myform').on('change', 'select', function (e) { //we watch and execute the next lines when any value from the dropdown#1 is selected
                                var id = $(this).val(); //we get the selected value on dropdown#1 and store it on id variable
                                var url = $('#application_url').val(); //we get the url from our hidden element that we used in first line of our view file, and store it on url variable
                                //here comes the ajax function part
                                console.log(id);
                                console.log(url);
                                console.log(url + "/admin/product/getDetails/" + id)
                                $.ajax({
                                    url: url + "/admin/product/getDetails/" + id, //we use the same url we used in our route file and we are adding the id variable which have the selected value in dropdown#1
                                    dataType: "json", //we specify that we are going to use json type of data. That's where we sent our query result (from our controller)
                                    success: function (data) { //*on my understanding using json datatype means that the variable "data" gets the value and that's why we use it to tell what to do since here.*
                                        //and this final part is where we use the dropdown#1 value and we set the values for the dropdown#2 just adding the variables that we got from our query (in controllert) through "data" variable.
                                        console.log(data)
                                        $('#productPrice').empty();
                                        $('#productPrice').val(data.price);
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
    </div>
    </div>
{{--    Thông tin chi tiết đơn đặt hàng--}}
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
                <th class="text-center">Thao tác</th>
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
                    <td class="text-center">
                        <a class="btn btn-warning" href="admin/orderdetails/edit/{{ $key->order_id }}">
                            <i class="fa fa-pencil fa-fw"></i>Sửa
                        </a>
                        <input type="button" class="btn btn-danger" value="Xoá"
                               onclick="return xoa({{ $key->id }});">
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" class="text-right">Tổng tiền : {{ $order->total }} </td>
            </tr>
            </tbody>
        </table>
        <a href="javascript:history.back()" class="btn btn-default mt-2">Quay lại</a>
    </div>
    </div>
    <script type="text/javascript">
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
