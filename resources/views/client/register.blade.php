@extends('client.main')

@section('title')
<title>Đăng ký tài khoản</title>
@endsection

@section('content')
    <div class="register-page mt-5">
        <div class="register-form">
            <div class="logo">
                <a href="/">
                    <img src="client/images/logo.svg" alt="">
                </a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="m-0 p-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name"><i class="fas fa-edit"></i></label>
                    <input type="text" id="name" placeholder="Tên" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="phone"><i class="fas fa-phone"></i></label>
                    <input type="text" id="phone" placeholder="Số điện thoại" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="login-email"><i class="fas fa-envelope"></i></label>
                    <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="login-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="login-password" placeholder="Mật khẩu" name="password" value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <label for="confirm-password"><i class="fas fa-lock"></i></label>
                    <input type="password" id="confirm-password" placeholder="Nhập lại mật khẩu" name="re_password" value="{{ old('re_password') }}">
                </div>
                <div class="form-group">
                    <label for="address"><i class="fas fa-lock"></i></label>
                    <input type="text" id="address" placeholder="Nhập địa chỉ" name="address" value="{{ old('address') }}">
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
