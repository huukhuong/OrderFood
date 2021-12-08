@extends('admin.main')

@section('title')
    <title>Admin | Danh sách danh mục</title>
@endsection

@section('content')
    @if (session('xoathanhcong'))
        <script>
            Swal.fire(
                'Đã xoá!',
                'Bạn đã xoá thành công',
                'success'
            )
        </script>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thống kê</h3>
        </div>
        <div>
            <form action="" method="post">
                <label for=""> Chọn ngày</label>
                <div class="input-group date" data-provide="datepicker" style="max-width: 500px">
                    <input type="date" class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input type="date" class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>
                    <th>Tên danh mục</th>
                    <th class="text-center">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"></td>
                        <td></td>
                        {{-- <td class="text-center"></td> --}}
                        {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                        <td class="text-center">
                            <a class="btn btn-warning" href="admin/category/edit/">
                                <i class="fa fa-pencil fa-fw"></i>Sửa
                            </a>
                            <input type="button" class="btn btn-danger" value="Xoá"
                                   onclick="return xoa();">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
        function xoa(id) {
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
                } else {
                    return false;
                }
            })

        }
    </script>

@endsection
