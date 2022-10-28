@extends('admin.main')

@section('title')
    <title>Quản lý Chi tiết hoá đdơn | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa Chi tiết hoá đdơn </h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('suathanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Đã sửa thành công',
                }).then(function() {
                    window.location = "admin/category/list";
                });
            </script>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <form action="admin/orderdetails/edit" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã chi tiết</label>
                        <input type="text" class="form-control" name="id" value="{{ $orderDetails->order_id }}" disabled>

                    </div>
                    <div class="form-group">
                        <label>Danh sách sản phẩm</label>
                        <select class="form-control" name="supplierID">
                            @foreach ($products as $key)
                                <option  @if ($orderDetails->product_id == $key->id) selected @endif value="{{ $key->id }}"> {{ $key->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng</label>
                        <input type="number" class="form-control" name="id" value="{{ $orderDetails->amount }}" >

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>



@endsection
