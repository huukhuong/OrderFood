@extends('admin.main')

@section('title')
    <title>Quản lý NCC | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Sửa thông tin NCC</h3>
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
        @if (session('suathanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Sửa sản phẩm thành công',
                }).then(function() {

                });
            </script>
        @endif

        <form action="admin/supplier/edit" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="supplierId" value="{{ $supplier->id }}">
                    <label for="productName">Tên NCC</label>
                    <input type="text" class="form-control" id="productName" name="supplierName"
                        placeholder="Nhập tên NCC" value="{{ $supplier->name }}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="supplierAddress" rows="3" placeholder="Enter ..."
                              value="{{ $supplier->address }}">
                </div>
                <div class="form-group">
                    <label>Liên lạc</label>
                    <input type="text" class="form-control" name="supplierContact" rows="3" placeholder="Enter ..."
                           value="{{ $supplier->contact }}">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea type="text" class="form-control" name="supplierDescription" rows="3" placeholder="Enter ..."
                              value="">{{ $supplier->description }}</textarea>
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
    </script>

@endsection
