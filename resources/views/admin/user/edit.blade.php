@extends('admin.main')

@section('title')
    <title>Quản lý Món | Sửa thông tin</title>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Xem thông tin user</h3>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif

        <form action="admin/user/edit" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <label for="">Tên người dùng</label>
                    <input type="text" class="form-control" id="" name=""
                        placeholder="Nhập tên món ăn" disabled  value="{{ $user->name }} ">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" class="form-control" id="" name=""
                           placeholder="" disabled value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name=""
                           placeholder=""disabled value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name=""
                           placeholder=""disabled value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    @if($user -> status == 1)
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Đang hoạt động">
                    @else
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Đang bi khoá ">
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Quyền</label>
                    @if($user -> role == 1)
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Admin">
                    @else
                        <input type="text" class="form-control" id="" name=""
                               placeholder=""disabled value="Người dùng">
                    @endif
                </div>
            </div>
            <!-- /.card-body -->
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
