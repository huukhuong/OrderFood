@extends('client.main')

@section('title')
<title>Đăng nhập</title>
@endsection

@section('content')
    <div class="login-page">
        <div class="login-form">
            <div class="logo">
                <a href="/">
                    <img src="client/images/logo.svg" alt="">
                </a>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="login-email"><i class="fas fa-envelope"></i></label>
                    <input type="email" id="login-email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="login-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="login-password" placeholder="Mật khẩu">
                </div>
                <div class="login-option">
                    <div class="remember">
                        <input type="checkbox" id="remember-password">
                        <label for="remember-password">Ghi nhớ đăng nhập</label>
                    </div>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <button class="btn-login">Đăng nhập</button>
            </form>
            <span>Bạn chưa có tài khoản? <a href="#">Đăng ký</a></span>
            <div class="coppyright">
                <p>© 2021 Fast Food</p>
            </div>
        </div>
    </div>
@endsection
