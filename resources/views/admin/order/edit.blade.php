@extends('admin.main')

@section('title')
    <title>Quản lý đơn hàng | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sửa thông đơn hàng</h3>
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
        @if (session('capnhatdonhangthanhcong'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: 'Cập nhật trạng thái thành công',
                }).then(function () {

                });
            </script>
        @endif

        <form action="admin/order/edit" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="">Mã </label>
                    <input type="hidden" class="form-control" id="id" name="idOrder"
                           placeholder="" value="{{ $order->id }}">
                    <input type="text" class="form-control" id="" name=""
                           placeholder="" disabled value="{{ $order->id }}">
                </div>
                <div class="form-group">
                    <label for="order">Tên khách hàng</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder="" disabled value="{{ $order->user_linked->name}}">
                </div>
                <div class="form-group">

                    <label for="order">Địa chỉ</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder="" disabled value="{{ $order->address }}">
                </div>
                <div class="form-group">
                    <label for="order">Số điện thoại</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder="" disabled value="{{ $order->phone }}">
                </div>
                <div class="form-group">
                    <label for="order">Thời gian tạo đơn</label>
                    <input type="text" class="form-control" id="order" name="order"
                           placeholder="" disabled value="{{ $order->created_at }}">
                </div>
                <div class="form-group">
                    <label for="order">Mô tả</label>
                    <textarea class="form-control" id="order" name="order"
                              placeholder="" disabled>{{ $order->description }} </textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="status">
                        @if($order -> status == 0)
                            <option value="1">Đang giao hàng</option>
                        @elseif($order -> status == 1)
                            <option value="2">Đã giao hàng</option>

                        @elseif($order -> status == 2)
                            <option value="-1">Đã huỷ đơn</option>

                        @elseif($order -> status == -1)
                            <option value="1">Đang chuẩn bị</option>
                        @endif


                    </select>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

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
