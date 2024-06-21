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

        <form action="admin/user/edit" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="userId" value="{{ $user->id }}">
                    <label for="">Tên người dùng</label>
                    <input type="text" class="form-control" id="" name="userName"
                        placeholder=""   value="{{ $user->name }} ">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" class="form-control" id="" name="userEmail"
                           placeholder=""  value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name="userPhone"
                           placeholder="" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name="userAddress"
                           placeholder="" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select class="form-control" name="userStatus">
                        <option value="0" @if($user -> status == 0) selected @endif>Đang tạm khoá</option>
                        <option value="1" @if($user -> status == 1) selected @endif>Đang hoạt động</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quyền</label>
                    <select class="form-control" name="userRole">
                        <option value="0" @if($user -> role == 0) selected @endif>Người dùng</option>
                        <option value="1" @if($user -> status == 1) selected @endif>Admin</option>
                        <option value="2" @if($user -> status == 2) selected @endif>Quản lý bán hàng</option>
                        <option value="3" @if($user -> status == 3) selected @endif>Quản lý kho</option>
                    </select>
                </div>
                <a href="javascript:history.back()" class="btn btn-primary">Quay lại</a>
                <button type="submit" class="btn btn-success">Lưu</button>
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
