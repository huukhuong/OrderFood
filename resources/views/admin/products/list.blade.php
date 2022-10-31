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
        <div class="card-header bg-cyan">
            Thông báo
        </div>
        <div class="card-body bg-gray">
            @if(!is_null($SanPhamHetHang))
                Sản phẩm sắp hết hàng :
                @foreach($SanPhamHetHang as $key)
                    {{$key -> name}}  ==> <a href="admin/import/add" class="text-cyan">Nhập hàng ngay</a>
                @endforeach
                @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <a href="admin/product/add">
                <button class="btn btn-success">Thêm món mới</button>
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <p>Tìm kiếm sản phẩm</p>
        </div>
        <div class="card-body">
            <form class="form-inline" action="admin/product/search" method="get">
                @csrf
                <div class="form-outline p-sm-1">
                    <input type="search" name="searchName" class="form-control" id="" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-outline p-1">
                    <select class="form-control" name="category">
                        <optgroup label="Chọn danh mục">
                            <option value="" selected="selected" style="display:none">Danh mục</option>
                            @foreach($categories as $key)
                                <option value="{{$key->id}}">{{$key -> name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <div class="form-outline p-1">
                    <select class="form-control" name="supplier">
                        <optgroup label="Chọn nhà sản xuất">
                            <option value="" selected="selected" style="display:none">Nhà cung cấp</option>
                            @foreach($supplier as $key)
                                <option value="{{$key->id}}">{{$key -> name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Tìm</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-blue">
            <h3 class="card-title">Danh sách sản phẩm</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="dtBasicExample" class="table table-bordered table-striped table-hover text-center ">
                <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên SP</th>
                    <th> Đơn giá</th>
                    <th> Giá nhập</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>NCC</th>
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
                        <td>{{ number_format($key->price) }}</td>
                        <td>{{ number_format($key->price_import) }}</td>
                        <td>{{ $key->quantity }}</td>
                        <td>{{ $key->category_linked->name }}</td>
                        <td style="max-width:150px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $key->supplier_linked->name }}</td>
                        <td><img src="./img/products/{{ $key->image }}" width="120"></td>
                        {{-- <td>{{$key ->image}}</td> --}}
                        <td class="text-truncate" style="max-width: 200px;">{!! $key->description !!}</td>
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
        {{ $product->links('pagination::bootstrap-4') }}
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
