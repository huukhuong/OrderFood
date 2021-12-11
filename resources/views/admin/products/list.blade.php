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
            <h3 class="card-title">Danh sách món ăn</h3>
        </div>
        <div class="text-center py-3">
            <a href="admin/product/add"> <button class="btn btn-success">Thêm món mới</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>
                        <th>Tên SP</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $key)
                        <tr>
                            <td class="text-center">{{ $key->id }}</td>
                            <td>{{ $key->name }}</td>
                            <td>{{ $key->price }}</td>
                            <td>{{ $key->quantity }}</td>
                            <td>{{ $key->category_id }}</td>
                            <td><img src="./img/products/{{ $key->image }}" width="120"></td>
                            {{-- <td>{{$key ->image}}</td> --}}
                            <td>{{ $key->description }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="admin/product/edit/{{ $key->id }}">
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
        {{ $product->links('admin.components.paginate') }}
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
