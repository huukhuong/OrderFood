@extends('admin.main')

@section('title')
    <title>Quản lý nhập hàng | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa Phiếu Nhập</h3>
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

        <form action="admin/import/edit" method="post">
            <div class="card-body">
                @csrf
                <input type="hidden" value="{{$import->id}}" name="importID">
                <div class="form-group" readonly>
                    <label for="order">Tên nhân viên</label>
                    <select class="form-control" name="userId">
                        @foreach ($users as $key)
                            @if(Auth::user()->role != 1 && $key->id == Auth::user()->id )
                                <option value="{{ $key->id }}"
                                        @if(Auth::user()->id == $key ->id) selected @endif> {{ $key->name }} </option>
                            @endif
                            @if(Auth::user()->role == 1)
                                <option value="{{ $key->id }}"
                                        @if(Auth::user()->id == $key ->id) selected @endif> {{ $key->name }} </option>
                            @endif
                        @endforeach
                    </select>
                    <div class="form-group" readonly>
                        <label for="order">Tên NCC</label>
                        <select class="form-control" name="supplierID">
                            <option value="{{ $import->supplier_linked->id }}"
                                    selected> {{ $import->supplier_linked->name }} </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order">Thời gian tạo đơn</label>
                        <input type="text" class="form-control" id="order" name="importCreated" placeholder=""
                               value="{{$import -> created_at}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="order">Mô tả</label>
                        <textarea class="form-control" id="order" name="importDescription" placeholder=""
                        >{{$import -> description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái đơn hàng</label>
                        <select class="form-control" name="importStatus">
                            <option value="0">Huỷ nhập hàng</option>
                            <option value="1" selected>Nhập hàng thành công</option>
                        </select>
                    </div>
{{--                    <div class="card bg-cyan form-inline">--}}
{{--                        <div class="mycopy d-inline-block" id="mycopy">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Sản phẩm</label>--}}
{{--                                <select id="sectorSelect" class="form-control sectorSelect" name="productID[]">--}}
{{--                                    @foreach ($products as $key)--}}
{{--                                        <option value="{{ $key->id }}"> {{ $key->name }} </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="order">Số lượng</label>--}}
{{--                                <input type="number" class="form-control" id="order" name="quantity[]" placeholder=""--}}
{{--                                       value="">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button type="button" class="btn btn-success" onclick="addChild()">Thêm sản phẩm</button>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="order">Tổng tiền đơn hàng</label>
                        <input type="number" class="form-control" id="order" name="importTotal" placeholder="" readonly
                               required
                               value="{{$import -> total}}">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

    </div>
    {{--Modal thêm chi tiết đặt hàng--}}
    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal"
                    @if($import->status != 1 && $import->status != 0) disabled @endif data-target="#exampleModalCenter">
                Thêm chi tiết đơn hàng
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="admin/importdetails/add" method="post" id="myform">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã hoá đơn</label>
                                    <input type="text" class="form-control" name="idImport" readonly
                                           value="{{ $import->id }}">

                                </div>
                                <input type="hidden" name="application_url" id="application_url"
                                       value="{{  url('') }}"/>
                                <div class="form-group">
                                    <label>Danh sách sản phẩm</label>
                                    <select id="sectorSelect" class="form-control sectorSelect" name="productID">
                                        @foreach ($products as $key)
                                            <option value="{{ $key->id }}"> {{ $key->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" class="form-control" name="amount" value="">

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="number" name="productPrice" id="productPrice" class="form-control"
                                           value="">
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
    {{--    Thông tin chi tiết phiếu nhập--}}
    <div class="card">
        <div class="card-header bg-gray"> Thông tin chi tiết phiếu nhập hàng</div>
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

                @foreach ($importdetails as $key)
                    <tr>
                        <td class="text-center">{{ $key->import_id }}</td>
                        <td>{{ $key->products_linked->name }}</td>
                        <td>{{ $key->amount }}</td>
                        <td>{{ number_format($key->products_linked->price, 0) }}</td>
                        <td>{{ number_format($key->products_linked->price * $key->amount, 0) }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning"
                               href="admin/importdetails/edit/importID={{$key->import_id}}&productID={{$key->product_id}}">
                                <i class="fa fa-pencil fa-fw"></i>Sửa
                            </a>
                            <a class="btn btn-danger"
                               href="admin/importdetails/delete/importID={{$key->import_id}}&productID={{$key->product_id}}">
                                <i class="fa fa-trash fa-fw"></i>Xoá
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6" class="text-right">Tổng tiền : {{ number_format($import->total ,0)}} </td>
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
