@extends('admin.main')

@section('title')
    <title>Admin | Danh sách món</title>
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
            <h3 class="card-title">Danh sách đơn hàng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th>Mã Khách hàng</th>
                        <th>Tên Khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $key)
                        <tr>
                            <td class="text-center">{{ $key->id }}</td>
                            <td>{{ $key->user_id }}</td>

                            <td>{{ $key->user_linked->name }}</td>
                            <td>{{ number_format($key->total,0)}}</td>
                            @if($key -> status == -1)
                                <td>
                                    <span class="badge badge-danger">Đã huỷ đơn</span>
                                </td>
                            @elseif($key -> status == 0)
                                <td>
                                    <span class="badge badge-warning">Đang chuẩn bị</span>
                                </td>
                            @elseif($key -> status == 1)
                                <td>
                                    <span class="badge badge-info">Đang giao hàng</span>
                                </td>
                            @elseif($key -> status == 2)
                                <td>
                                    <span class="badge badge-success">Đã giao hàng</span>
                                </td>
                            @endif
                            <td>{{ $key->address }}</td>
                            <td>{{ $key->phone }}</td>
                            <td>{{ $key->description }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="admin/order/details/{{ $key->id }}">
                                    Xem chi tiết
                                </a>
                                <a class="btn btn-warning" href="admin/order/edit/{{ $key->id }}">
                                    Cập nhật
                                </a>
                                @if($key -> status == 0)
                                    <a class="btn btn-secondary" href="admin/order/edit/{{ $key->id }}">
                                        Phân Công
                                    </a>
                               @endif

                                {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>

        </div>
        <!-- /.card-body -->

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
