@extends('admin.main')

@section('title')
    <title>Quản lý Danh mục | Thêm mới</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm danh mục món</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('themthanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Đã thêm thành công',
                }).then(function() {
                    window.location = "admin/category/list";
                });
            </script>
        @endif
        <!-- /.card-header -->
        <div class="card-body">
            <form action="admin/partners/add" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đối tác</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Nhập tên đối tác">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" id="email"
                               placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone"
                               placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address"
                               placeholder="Nhập địa chỉ">
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
