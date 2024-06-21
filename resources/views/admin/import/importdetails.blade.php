@extends('admin.main')

@section('title')
    <title>Quản Đơn Hàng | Xem thông tin chi tiết đơn hàng</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header  bg-blue">
            <h3 class="card-title"> Xem thông tin chi tiết đơn hàng</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('chuacofile'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Chưa thêm file',

                })
            </script>
        @endif
        @if (session('suathanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Sửa sản phẩm thành công',
                }).then(function() {
                    window.location = "admin/product/list";
                });
            </script>
        @endif
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">Mã</th>

                        <th class="text-center">Tên Sản phẩm</th>
                        <th class="text-center" style="width: 100px">Số lượng</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($import_details as $key)
                        <tr>
                            <td class="text-center">{{ $key->import_id }}</td>
                            <td>{{ $key->products_linked->name }}</td>
                            <td>{{ $key->amount }}</td>
                            <td>{{ number_format($key->products_linked->price, 0) }}</td>
                            <td>{{ number_format($key->products_linked->price * $key->amount, 0) }}</td>
                            {{-- <td class="text-center"></td> --}}
                            {{-- <td class="text-center"><a href="admin/category/delete/{{$key->id}}"><button class="btn btn-danger"><i class="fas fa-trash"></i>Xoá</button></a></td> --}}
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><h2>Tổng tiền : {{ number_format($import->total ,0)}} </h2></td>
                    </tr>
                </tbody>
            </table>
            <a href="javascript:history.back()" class="btn btn-primary mt-2">Quay lại</a>
        </div>
        <!-- /.card-body -->
    </div>

    <script type="text/javascript">
        const input = document.getElementById('imgInp')
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
