<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeControlller extends Controller
{

    public function index()
    {
        return view('client.home', ['page' => 'home']);
    }

    public function shop()
    {
        return view('client.shop', ['page' => 'shop']);
    }

    public function register()
    {
        return view('client.register', ['page' => 'register']);
    }

    public function login()
    {
        return view('client.login', ['page' => 'login']);
    }

    public function cart() {
        return view('client.cart', ['page' => 'cart']);
    }

}
