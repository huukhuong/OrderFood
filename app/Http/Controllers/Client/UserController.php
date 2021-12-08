<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'emai' => 'email',
                'password' => 'required'
            ],
            [
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống'
            ]
        );
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->remember == null ? false : true;

        $data = [
            'email' => $email,
            'password' => $password,
        ];
        // thêm tài khoản bị khoá
        $status = User::where('email', $email)->value('status');
        if($status == 0){
            return Redirect::back()->withErrors(['msg' => 'Tài khoản của bạn đã bị khoá liên hệ admin để biết thêm chi tiết']);
        }
        if (Auth::attempt($data, $remember)) {
            return redirect('/');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Sai thông tin đăng nhập']);
        }
    }

    public function postRegister(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                're_password' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập họ tên của bạn',
                'phone.required' => 'Vui lòng nhập số điện thoại của bạn',
                'phone.numeric' => 'Định dạng số điện thoại không hợp lệ',
                'email.required' => 'Vui lòng nhập địa chỉ email',
                'email.email' => 'Định dạng email không hợp lệ',
                'email.unique' => 'Email đã tồn tại trên hệ thống',
                'password.required' => 'Không được để trống mật khẩu',
                're_password.required' => 'Xác nhận mật khẩu không được rỗng',
                 'address.required' => 'Xác nhận địa chỉ không được rỗng'
            ]
        );

        $password = $request->password;
        $re_password = $request->re_password;
        if ($password != $re_password) {
            return Redirect::back()->withErrors(['msg' => 'Xác nhận mật khẩu không khớp']);
        }

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user -> address = $request -> address;
        $user -> role = 0;
        $user->save();

        auth()->login($user);

        return redirect('/');
    }
}
