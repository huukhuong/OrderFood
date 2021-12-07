<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeControlller extends Controller
{

    public function index()
    {

        $products_newest = Products::where('status', 1)->limit(10)->get();
        $products = Products::where('status', 1)->limit(5)->get();
        return view(
            'client.home',
            [
                'page' => 'home',
                'products' => $products,
                'products_newest' => $products_newest
            ]
        );
    }

    public function shop()
    {
        $category = Categories::all();
        $products = Products::where('status', 1)->get();
        return view('client.shop', ['page' => 'shop', 'products' => $products, 'category' => $category]);
    }

    public function register()
    {
        return view('client.register', ['page' => 'register']);
    }

    public function login()
    {
        return view('client.login', ['page' => 'login']);
    }

    public function cart()
    {
        return view('client.cart', ['page' => 'cart']);
    }
    public function search(Request $request)
    {
        $name = $request->keyword;
        $category = Categories::all();
        $productsearch = Products::where('name', 'like', '%' . $name . '%')->Paginate(10);
        return view('client.search', ['page' => 'shop', 'productsearch' => $productsearch, 'category' => $category]);
    }

    public function order()
    {
        if (Auth::user()) {   // Check is user logged in
            return view('client.order', ['page' => 'order']);
        } else {
            return redirect("login");
        }
    }

    public function orderSuccess()
    {
        return view('client.order_success', ['page' => 'order_success']);
    }
}
