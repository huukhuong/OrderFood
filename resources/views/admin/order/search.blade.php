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
            <a href="admin/order/add">
                <button class="btn btn-success">Thêm</button>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p>Tìm kiếm đơn hàng</p>
            <form class="form-inline" action="admin/order/search" method="get">
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
                @php

                $orderStatus  = -2 ;
                 if (isset($_GET['orderStatus']) && $_GET['orderStatus'] != null){
$orderStatus = $_GET['orderStatus'];
}
                @endphp
                <div class="form-outline pl-2 pr-2">
                    <select class="form-control" name="orderStatus">
                        <option value="-1">Đơn hàng bị huỷ</option>
                        <option value="0">Đang đợi quán xác nhận</option>
                        <option value="1" selected>Đang chuẩn bị</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Đã nhận được hàng</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title">Danh sách đơn hàng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px">Mã</th>
                    <th>Tên Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Mô tả</th>
                    <th>Ngày đặt</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order as $key)
                    <tr>
                        <td class="text-center">{{ $key->id }}</td>

                        <td>{{ $key->user_linked->name }}</td>
                        <td>{{ number_format($key->total, 0) }}</td>
                        @if ($key->status == -1)
                            <td>
                                <span class="badge badge-danger">Đã huỷ đơn</span>
                            </td>
                        @elseif($key -> status == 0)
                            <td>
                                <span class="badge badge-warning">Đang đợi xác nhận</span>
                            </td>
                        @elseif($key -> status == 1)
                            <td>
                                <span class="badge badge-info">Đang chuẩn bị</span>
                            </td>
                        @elseif($key -> status == 2)
                            <td>
                                <span class="badge badge-primary">Đang giao hàng</span>
                            </td>
                        @elseif($key -> status == 3)
                            <td>
                                <span class="badge badge-secondary">Đã giao hàng</span>
                            </td>
                        @elseif($key -> status == 4)
                            <td>
                                <span class="badge badge-success">Đã nhận được hàng</span>
                            </td>
                        @endif
                        <td>{{ $key->address }}</td>
                        <td>{{ $key->phone }}</td>
                        <td>{{ $key->description }}</td>
                        <td>{{ $key->created_at }}</td>
                        <td class="text-left">
                            <a class="btn btn-primary " href="admin/order/details/{{ $key->id }}">
                                Xem chi tiết
                            </a>
                            <a class="btn btn-warning " href="admin/order/edit/{{ $key->id }}">
                                Cập nhật
                            </a>
                            <a class="btn btn-dark " href="admin/order/print/{{ $key->id }}">
                               PDF
                            </a>
                        @if ($key->status == 0)
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#order{{ $key->id }}">
                                    Phân công
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="order{{ $key->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="admin/order/savepartner" class=""
                                                      method="post">
                                                    @csrf
                                                    <select class="form-control" name="idpartner">
                                                        @foreach ($partners as $key2)
                                                            <option value="{{ $key2->id }}">{{ $key2->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" value="{{ $key->id }}" name="idorder">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="d-flex justify-content-center">
            {{ $order->withQueryString()->links('pagination::bootstrap-4') }}
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
