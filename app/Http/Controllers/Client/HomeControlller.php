<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeControlller extends Controller
{

    public function index()
    {
        $products = Products::all();
        return view('client.home', ['page' => 'home','products' => $products]);
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
