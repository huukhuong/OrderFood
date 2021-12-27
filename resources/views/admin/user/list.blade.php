@extends('admin.main')

@section('title')
    <title>Admin | Danh sách người dùng</title>
@endsection

@section('content')
    @if (session('khoathanhcong'))
        <script>
            Swal.fire(
                'Thành công!',
                'Bạn đã khoá thành công',
                'success'
            )
        </script>
    @endif
    @if (session('mokhoathanhcong'))
        <script>
            Swal.fire(
                'Thành công!',
                'Bạn đã mở khoá thành công',
                'success'
            )
        </script>
    @endif
    @if (session('resetthanhcong'))
        <script>
            Swal.fire(
                'Thành công!',
                'Bạn đã khôi phục mật khẩu',
                'success'
            )
        </script>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách người dùng</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Quyền</th>
                        <th class="text-center">Trạng Thái</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $key)
                        <tr>
                            <td class="text-center">{{ $key->id }}</td>
                            <td>{{ $key->email  }}</td>
                            @if($key -> role == 1 )
                               <td>Admin</td>
                            @else
                            <td>Người dùng</td>

                            @endif
                            @if($key-> status == 1 )
                            <td>Active</td>
                            @else
                            <td>Blocked</td>
                            @endif
                            {{-- <td>{{$key ->image}}</td> --}}
                            <td class="text-center">
                                <a class="btn btn-success" href="admin/user/edit/{{ $key->id }}">
                                    Xem
                                </a>
                                {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                                @if ( $key -> status == 1 )
                                   <input type="button" class="btn btn-danger" value="Khoá"
                                       onclick="return khoa({{ $key->id }});">
                                @else
                                    <input type="button" class="btn btn-danger" value="Mở Khoá"
                                           onclick="return khoa({{ $key->id }});">
                                @endif
                                <input type="button" class="btn btn-primary" value="Khôi phục mật khẩu"
                                       onclick="return resetpasswd({{ $key->id }});">
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>

        </div>
        <!-- /.card-body -->

    </div>
    <div class="d-flex justify-content-center">
     {{--   {!! $user->links() !!}--}}
    </div>

    <script>
        function khoa(id) {
            Swal.fire({
                title: 'Bạn có chắc khoá tài khoản này không?',
                text: "Sau khi khoá, để mở khoá bạn nhấn vào mở khoá !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "admin/user/block/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
        function resetpasswd(id) {
            Swal.fire({
                title: 'Bạn có chắc khôi phục lại mật khẩu không?',
                text: "Mật khẩu sau khi khôi phục là 123456",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "admin/user/resetpasswd/" + id;
                    return true;
                } else {
                    return false;
                }
            })

        }
    </script>

@endsection
