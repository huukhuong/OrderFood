@extends('admin.main')

@section('title')
    <title>Admin | Danh sách đơn nhập hàng</title>
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
    @if (session('capnhatgiaohang'))
        <script>
            Swal.fire(
                'Đã phân công~',
                'Bạn phân công thành công',
                'success'
            )
        </script>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="admin/import/add">
                <button class="btn btn-success">Thêm</button>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p>Tìm kiếm</p>
            <form class="form-inline" action="admin/import/search" method="get">
                <div class="form-outline p-sm-1">
                    <input type="search" name="searchId" class="form-control" id="" placeholder="Nhập mã đơn hàng">
                </div>
                <div class="input-group date" data-provide="datepicker" style="max-width: 500px">
                    <input type="date" class="form-control" name="startDay">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                    <input type="date" class="form-control" name="endDay">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Danh sách đơn nhập hàng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>
                    <th>Tên nhân viên nhập</th>
                    <th>NCC</th>
                    <th>Ghi chú</th>
                    <th>Tổng tiền</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($imports as $key)
                    <tr>
                        <td class="text-center">{{ $key->id }}</td>
                        <td>{{ $key->user_linked->name }}</td>
                        <td>{{ $key->supplier_linked->name }}</td>
                        <td>{{ $key->description }}</td>
                        <td>{{ number_format($key->total ,0)}} VNĐ</td>
                        <td>{{ $key->created_at }}</td>
                         @if ($key->status == 0)
                            <td>
                                <span class="badge badge-danger">Đã huỷ nhập</span>
                            </td>
                        @elseif($key -> status == 1)
                            <td>
                                <span class="badge badge-warning">Đã nhập</span>
                            </td>
                        @endif
                        <td class="text-left">
                            <a class="btn btn-primary " href="admin/import/details/{{ $key->id }}">
                                Xem chi tiết
                            </a>
                            <a class="btn btn-warning " href="admin/import/edit/{{ $key->id }}">
                                Cập nhật
                            </a>
                            <a class="btn btn-dark " href="admin/import/print/{{ $key->id }}">
                                PDF
                            </a>
                            {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center">
            {{ $imports->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <div class="d-flex justify-content-center">

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
                    location.href = "admin/product/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

@endsection
