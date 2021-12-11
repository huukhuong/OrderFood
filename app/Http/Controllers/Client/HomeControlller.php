<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Products;
use Database\Seeders\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

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
        $products = Products::where('status', 1)->paginate(20);
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
        $productsearch = Products::where('name', 'like', '%' . $name . '%')->paginate(10);
        return view('client.search', ['page' => 'shop', 'productsearch' => $productsearch, 'category' => $category]);
    }

    public function order()
    {
        if (Auth::user()) {   // Check is user logged in
            $products = Session::get('cart');
            return view('client.order', ['page' => 'order', 'products' => $products]);
        } else {
            return redirect("login");
        }
    }

    public function orderSuccess(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required',
            ],
            [
                'name.required' => 'Vui lòng điền họ tên của bạn',
                'phone.numberic' => 'Số điện thoại không hợp lệ',
                'address.required' => 'Vui lòng điền địa chỉ'
            ]
        );

        $user_id = $request->id;
        $description = isEmpty($request->description) ? "Không" : $request->description;

        $order = new Orders();
        $order->user_id = $user_id;
        $order->address = $request->address;
        $order->total = $request->total;
        $order->phone = $request->phone;
        $order->description = $description;
        $order->save();

        $order_id = $order->id;
        $cart = Session::get('cart');
        // đưa order_detai vào
        foreach ($cart as $key => $value) {
            $order_detail = new Orderdetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $value['id'];
            $order_detail->amount = $value['quantity'];
            $order_detail->price = $value['price'];
            $order_detail->save();
        }
        //  unset($cart);
        // méo hiểu sao đoạn này phải làm như này
        $cart = Session::get('cart');
        foreach ($cart as $key => $value) {
            unset($cart[$key]);
        }
        Session::put('cart', $cart);
        return redirect('order_success');
    }

    public function detailProduct($id)
    {
        $product = Products::find($id);
        $products = Products::where('category_id', $product->category_id)->get();
        return view('client.product_detail', ['page' => 'order_success', 'product' => $product, 'products' => $products]);
    }

    public function addToCart($id)
    {
        $check = true;
        $product = DB::select('select * from products where id=' . $id);
        $cart = Session::get('cart');

        // update nếu sản phẩm đã nằm trong session
        foreach ($cart as &$key) {
            if ($key['id'] == $product[0]->id) {
                $key['quantity'] += 1;
                $check = false;
            }
        }
        if ($check) {
            $cart[$product[0]->id] = array(
                "id" => $product[0]->id,
                "name" => $product[0]->name,
                "price" => $product[0]->price,
                "image" => $product[0]->image,
                "quantity" => 1,
            );
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã thêm thành công!');
    }


    public function updateCart(Request $request)
    {
        $id = $request->idUpdate;
        $quantity = $request->quantityUpdate;
        $product = DB::select('select * from products where id=' . $id);
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

    public function deleteCart($id)
    {
        $cart = Session::get('cart');
        foreach ($cart as $key => $value) {
            if ($value['id'] == $id) {
                unset($cart[$key]);
            }
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm đã xoa thành công!');
        //        $product = session::forget('cart', $key['id'])->first();
        //        $product->destroy($key['id']);

    }
}
