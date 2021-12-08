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
            <form action="admin/statistical/thongke1" method="post">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Chọn ngày</h3>
                    <br>
                    <div class="input-group date" data-provide="datepicker" style="max-width: 500px">
                        <input type="date" class="form-control" name="ngaybatdau">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                        <input type="date" class="form-control" name="ngayketthuc">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="Lọc">
                </div>

            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center">Tên Sản Phẩm</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Ngày đặt</th>
                </tr>
                </thead>
                <tbody>
                @php $tong = 0 @endphp
                @foreach($thongke as $key)
                <tr>
                    <td class="text-center">{{$key->name}}</td>
                    <td class="text-center">{{$key -> price}}</td>
                    <td class="text-center">{{$key -> amount}}</td>
                    <td class="text-center">{{$key -> created_at}}</td>
                    @php $tong += $key ->price * $key -> amount @endphp
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">
                        <h4>
                            Tổng doanh thu
                        </h4>
                    </td>
                    <td class="text-center"> <h4>   {{number_format($tong,0)}}</h4> </td>
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
