@extends('admin.main')

@section('title')
    <title>Admin | Danh sách nhân viên</title>
@endsection

@section('content')
    @if (session('themthanhcong'))
        <script>
            Swal.fire(
                'Đã thêm!',
                'Bạn đã thêm đối tác thành công',
                'success'
            )
        </script>
    @endif
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
            <h3 class="card-title">Danh sách nhân viên</h3>
        </div>
        <div class="text-center py-3">
            <a href="admin/partners/add"> <button class="btn btn-success">Thêm nhân viên</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th class="text-center">Tên đối tác</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">SĐT</th>
                        <th class="text-center">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $key)
                        <tr>
                            <td class="text-center">{{ $key->id }}</td>
                            <td class="text-center">{{ $key->name }}</td>
                            <td class="text-center">{{ $key->email }}</td>
                            <td class="text-center">{{ $key->phone }}</td>
                            <td class="text-center">{{ $key->address }}</td>
                            {{-- <td class="text-center"></td> --}}
                            {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                            <td class="text-center">
                                <a class="btn btn-warning" href="admin/partners/edit/{{ $key->id }}">
                                    <i class="fa fa-pencil fa-fw"></i>Sửa
                                </a>
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
                    location.href = "admin/partners/delete/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

@endsection
