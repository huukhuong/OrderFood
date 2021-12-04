@extends('admin.main')

@section('title')
    <title>Admin | Trang chủ</title>
@endsection

@section('content')
    @if(session('xoathanhcong'))
        <script >
            Swal.fire(
                'Đã xoá!',
                'Bạn đã xoá thành công',
                'success'
            )
        </script>
    @endif
   
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách thể loại món ăn</h3>
        </div>
        <a href="admin/category/add"> <button class="btn btn-success">Thêm thể loại</button></a>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th >Mã thể loại</th>
                    <th>Tên thể loại</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $key)
                <tr>
                    <td>{{$key -> id}}</td>
                    <td>{{$key ->name}}</td>
                    <td class="text-center"><a href="admin/category/edit/{{$key->id}}"><button class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i>Sửa</button></a></td>
{{--                    <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td>--}}
                    <td class="text-center"> <input type="button" class="btn btn-danger" value="Xoá" onclick="return xoa({{$key->id}});"></td>
                </tr>
                @endforeach



                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        function xoa(id){
            Swal.fire({
                title: 'Bạn có chắc xoá không',
                text: "Bạn sẽ không thể trở lại",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xoá',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "admin/category/delete/" + id;
                    return true;
                }
                else{
                    return false;
                }
            })

        }
    </script>

@endsection
