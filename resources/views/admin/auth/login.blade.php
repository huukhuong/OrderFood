<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin_lte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin_lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin_lte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="justify-content: start">
    <div class="login-box mt-5">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="#"><b>Admin</b>|Đăng nhập</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p class="m-0 p-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="/admin/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="w-100 mb-2">Địa chỉ email</div>
                        <input type="email" class="form-control" placeholder="Nhập Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="w-100 mb-2">Mật khẩu</div>
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 mb-3">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/admin_lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/admin_lte/dist/js/adminlte.min.js"></script>
</body>

</html>
