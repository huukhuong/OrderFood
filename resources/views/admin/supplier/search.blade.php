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
    <div class="py-3">
        <a href="admin/supplier/add"> <button class="btn btn-success">Thêm nhà cung cấp</button></a>
    </div>

    <form action="admin/supplier/search" method="get">
        @csrf
        <p>Tìm Kiếm NCC</p>
        <div class="form-outline mb-4">
            <input type="search" name="searchName" class="form-control" id="" placeholder="Tìm Kiếm">
        </div>
    </form>
    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Danh sách NCC</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th>Tên NCC</th>
                        <th>Địa chỉ</th>
                        <th>Mô Tả</th>
                        <th>Liên lạc</th>
                        <th>Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $key)
                        <tr>
                            <td class="text-center">{{ $key->id }}</td>
                            <td>{{ $key->name }}</td>
                            <td>{{ $key->address }}</td>
                            <td>{{ $key->description }}</td>
                            <td>{{ $key->contact }}</td>
                            <td>{{ $key->updated_at }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="admin/supplier/edit/{{ $key->id }}">
                                    <i class="fa fa-pencil fa-fw"></i>Sửa
                                </a>
                                {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                                <input type="button" class="btn btn-danger" value="Xoá"
                                    onclick="return xoa({{ $key->id }});">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>
    <div class="d-flex justify-content-center">
        {{ $suppliers->links('pagination::bootstrap-4') }}
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
                    location.href = "admin/supplier/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

@endsection
