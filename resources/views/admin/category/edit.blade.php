@extends('admin.main')

@section('title')
    <title>Quản lý Danh mục | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Sửa danh mục</h3>
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
            <form action="admin/category/edit" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Danh mục</label>
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="text" class="form-control" name="namecategory" id="namecategory"
                            placeholder="Nhập tên Danh mục" value="{{ $category->name }}">
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
