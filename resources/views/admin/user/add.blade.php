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

        <form action="admin/user/add" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="">
                    <label for="userName">Tên người dùng</label>
                    <input type="text" class="form-control" id="userName" name="userName"
                        placeholder=""   value="">
                </div>
                <div class="form-group">
                    <label for="userEmail">Địa chỉ email</label>
                    <input type="text" class="form-control" id="userEmail" name="userEmail"
                           placeholder=""  value="">
                </div>
                <div class="form-group">
                    <label for="UserPhone">Số điện thoại</label>
                    <input type="text" class="form-control" id="UserPhone" name="UserPhone"
                           placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="userAddress">Địa chỉ</label>
                    <input type="text" class="form-control" id="userAddress" name="userAddress"
                           placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>

                </div>
                <div class="form-group">
                    <label for="">Quyền</label>
                        <input type="text" class="form-control" id="" name=""
                               placeholder="" value="Admin">
                </div>
                <a href="javascript:history.back()" class="btn btn-default mt-2">Quay lại</a>
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
