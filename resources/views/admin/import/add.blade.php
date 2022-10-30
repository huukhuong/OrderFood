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

        <form action="admin/import/add" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="order">Tên khách hàng</label>
                    <select class="form-control" name="userId">
                        @foreach ($users as $key)
                            <option value="{{ $key->id }}"> {{ $key->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">

                    <label for="order">Địa chỉ</label>
                    <input type="text" class="form-control" id="order" name="orderAddress" placeholder=""
                           value="" required>
                </div>
                <div class="form-group">
                    <label for="order">Số điện thoại</label>
                    <input type="number" class="form-control" id="order" name="orderPhone" placeholder=""
                           value="" required>
                </div>
                <div class="form-group">
                    <label>Danh sách partners</label>
                    <select class="form-control" name="partnerId">
                        @foreach ($partners as $key)
                            <option value="{{ $key->id }}"> {{ $key->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">Thời gian tạo đơn</label>
                    <input type="text" class="form-control" id="order" name="orderCreated" placeholder=""
                           value="@php echo date('Y-m-d H:i:s') @endphp">
                </div>
                <div class="form-group">
                    <label for="order">Mô tả</label>
                    <textarea class="form-control" id="order" name="orderDescription" placeholder=""
                    >Không</textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="orderStatus">
                        <option value="-1">Đơn hàng bị huỷ</option>
                        <option value="0">Đang đợi quán xác nhận</option>
                        <option value="1" selected>Đang chuẩn bị</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Đã nhận được hàng</option>
                    </select>
                </div>
                <div class="card bg-cyan form-inline">
                    <div class="mycopy d-inline-block" id="mycopy">
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select id="sectorSelect" class="form-control sectorSelect" name="productID[]">
                                @foreach ($products as $key)
                                    <option value="{{ $key->id }}"> {{ $key->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="order">Số lượng</label>
                            <input type="number" class="form-control" id="order" name="quantity[]" placeholder=""
                                   value="" >
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" onclick="addChild()">Thêm sản phẩm</button>
                </div>
                <div class="form-group">
                    <label for="order">Tổng đơn hàng</label>
                    <input type="number" class="form-control" id="order" name="orderCreated" placeholder="" readonly
                           required
                           value="">
                </div>
                <div class="form-group" readonly>
                    <label for="order">Tên nhân viên</label>
                    <select class="form-control" name="partnerId">
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
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

    </div>
    <script type="text/javascript">
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        function addChild() {
            var elem = document.querySelector('#mycopy');
            var clone = elem.cloneNode(true);
            elem.after(clone);
        }
    </script>

@endsection
