<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


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
        $products = Session::get('cart');
        return view('client.cart', ['page' => 'cart', 'products' => $products]);
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
            $products = Session::get('cart');
            return view('client.order', ['page' => 'order','products' => $products]);
        } else {
            return redirect("login");
        }
    }

    public function orderSuccess()
    {

        return view('client.order_success', ['page' => 'order_success']);
    }

    public function detailProduct($id)
    {
        $product = Products::find($id);
        $products = Products::where('category_id', $product->category_id)->get();
        return view('client.product_detail', ['page' => 'order_success', 'product' => $product, 'products' => $products]);
    }

    public function addToCart($id){
        $product = DB::select('select * from products where id='.$id);
        $cart = Session::get('cart');
        $cart[$product[0]->id] = array(
            "id" => $product[0]->id,
            "name" => $product[0]->name,
            "price" => $product[0]->price,
            "image" => $product[0]->image,
            "quantity" => 1,
        );
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã thêm thành công!');
    }
    public function updateCart(Request $request){
        $id = $request -> idUpdate;
        $quantity = $request -> quantityUpdate;
        $product = DB::select('select * from products where id='.$id);
        $cart = Session::get('cart');
        $cart[$product[0]->id] = array(
            "id" => $product[0]->id,
            "name" => $product[0]->name,
            "price" => $product[0]->price,
            "image" => $product[0]->image,
            "quantity" => $quantity,
        );

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã thêm thành công!');
    }

    public function deleteCart($id){
        $cart =  Session::get('cart');
        foreach ($cart as $key => $value){
            if ($value['id'] == $id){
               unset($cart[$key]);
            }
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã xoa thành công!');
//        $product = session::forget('cart', $key['id'])->first();
//        $product->destroy($key['id']);

    }
}
