@extends('client.main')

@section('title')
<title>Đăng ký tài khoản</title>
@endsection

@section('content')
    <div class="register-page mt-5">
        <div class="register-form">
            <div class="logo">
                <a href="/">
                    <img src="images/logo.svg" alt="">
                </a>
            </div>
            <form action="">
                <div class="form-group">
                    <label for="name"><i class="fas fa-edit"></i></label>
                    <input type="text" id="name" placeholder="Tên">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i></label>
                    <input type="text" id="phone" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="login-email"><i class="fas fa-envelope"></i></label>
                    <input type="email" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="login-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="login-password" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <label for="confirm-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="confirm-password" placeholder="Nhập lại mật khẩu">
                </div>
                <button class="btn-login">Đăng ký ngay</button>
            </form>
            <span>Bạn đã có tài khoản? <a href="login">Đăng nhập</a></span>
            <div class="coppyright">
                <p>© 2021 Fast Food</p>
            </div>
        </div>
    </div>
@endsection
