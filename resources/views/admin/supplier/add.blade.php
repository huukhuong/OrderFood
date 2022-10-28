@extends('admin.main')

@section('title')
    <title>Quản lý Món | Thêm mới</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Thêm NCC</h3>
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
        @if (session('themthanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Thêm sản NCC thành công',
                }).then(function() {
                    window.location = "admin/product/list";
                });
            </script>
        @endif
        <!-- form start -->
        <form action="admin/supplier/add" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="productName">Tên NCC</label>
                    <input type="text" class="form-control" id="productName" name="supplierName"
                           placeholder="Nhập tên NCC" value="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="supplierAddress" rows="3" placeholder="Địa chỉ"
                           value="">
                </div>
                <div class="form-group">
                    <label>Liên lạc</label>
                    <input type="text" class="form-control" name="supplierContact" rows="3" placeholder="Số điện thoại hoặc email"
                           value="">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" class="form-control" name="supplierDescription" rows="3" placeholder="Mô tả"
                              value=""></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a href="javascript:history.back()" class="btn btn-default">Quay lại</a>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
        <!-- /.card-body -->
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
