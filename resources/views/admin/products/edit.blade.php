@extends('admin.main')

@section('title')
    <title>Admin | Trang chủ</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm thể loại món ăn</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors -> all() as $err)
                    {{$err}} <br>
                @endforeach
            </div>
        @endif
        @if(session('suathanhcong'))
            <script >
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Đã sửa thành công',

                })
            </script>
    @endif
    <!-- /.card-header -->
        <div class="card-body">
            <form action="admin/category/edit" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thể loại</label>
                        <input type="hidden" name="id" value="{{$category -> id}}">
                        <input type="text" class="form-control"  name="namecategory" id="namecategory" placeholder="Nhập tên thể loại" value="{{$category->name}}">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>



@endsection
