<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Database\Seeders\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\String_;
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
        $products = Products::where('status', 1)->paginate(8);
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
        if(Auth::user()){
            if(auth()->user()->id != null){
                $user_id = auth()->user()->id ;
                $order = \App\Models\User::find($user_id)->order_linked;
                return view('client.cart', ['page' => 'cart', 'products' => $products,'order' => $order]);
            }
        }
        else{
            return view('client.cart', ['page' => 'cart', 'products' => $products]);
        }

    }

    public function cartDetails($id){
        if (Auth::user()) {   // Check is user logged in
            $order = Orders::find($id);
            $orderdetails = Orderdetail::where('order_id', $id)->get();
            return view('client.cart_details', ['page' => 'cart','orderdetails' => $orderdetails,'order' => $order]);
        } else {
            return redirect("login");
        }
    }

    public static function search(Request $request)
    {
        //$search = !empty(Request::input('category')) ? Request::input('category') : '';
        //        $currentURL = url()->current();
        //        $fullURL =  url()->full();
        //        $links = Str::replace($currentURL, '', $fullURL);
        $products = Products::query();
        $category = Categories::all();
        if($request -> has('category')){
            $products -> whereIn('category_id' , $request -> category)->paginate(10);
        }
        if ($request -> has('rdSort')){
            switch ($request -> rdSort){
                case 'A-Z' :
                    $products -> orderBy('name', 'ASC');
                    break;
                case 'giathapdencao':
                    $products -> orderBy('price', 'ASC');
                    break;
                case 'giacaotoithap':
                    $products -> orderBy('price', 'DESC');
                    break;
            }
        }
        if ($request ->has('keyword')){
            $name = $request -> keyword;
            $products -> where('name', 'like', '%' . $name . '%')->paginate(10);
        }
        $productss =  $products->paginate(10);

//        $name = $request->keyword;
//        $category = Categories::all();
//        $products = Products::where('name', 'like', '%' . $name . '%')->simplePaginate(5);
        return view('client.search', ['page' => 'search', 'products' => $productss, 'category' => $category]);
    }

    public function searchCategories(Request $request){

//        $categories = $request -> category;
//        if(!$categories){
//            return redirect()->back()->with('fail', 'Không tìm thấy');
//        }
//        $productsearch = new Collection(new Products());
//        $category = Categories::all();
//        foreach ($categories as $key){
//            $products = Products::where('category_id' , $key)->get();
//            $productsearch = $productsearch -> merge($products);
//        }
//        if(!$productsearch){
//            return redirect()->back()->with('fail', 'Không tìm thấy');
//        }
//        return view('client.shop', ['page' => 'shop', 'products' => $productsearch, 'category' => $category]);
    }

    public function checkSoLuongTrongKho($id){
        $product = Products::where('id',$id)->first();
        if($product != null){
            return $product -> quantity;
        }
        return 0;
    }

    public function order()
    {   $products = Session::get('cart');
        // kiểm tra số lượng sản phẩm trước khi đặt hàng
        foreach ($products as $item => $value){
                $item_id = $value['id'];
                $item_quantity = $value['quantity'];
                $item_kho = $this->checkSoLuongTrongKho($item_id);
                if($item_kho < $item_quantity){
                    return redirect()->back()->with('fail', 'Đặt hàng không thành công,trong kho chỉ còn ' . $item_kho. " " . $value['name'] );
                }
        }
         if (Auth::user()) {   // Check is user logged in
            return view('client.order', ['page' => 'order', 'products' => $products]);
        } else {
            return redirect("login");
        }
    }

    public function orderDelete($id){
        $order = Orders::find($id);
        $order->status = 0;
        if($order->save()){
            return redirect()->back()->with('success', 'Đã huỷ đơn đặt hàng thành công');
        }
        else{
            return redirect()->back()->with('fail', 'Có lỗi xảy ra');
        }
    }
    public function orderCancel($id){
        $order = Orders::find($id);
        $order->status = -1;
        if($order->save()){
            return redirect()->back()->with('success', 'Đã huỷ đơn đặt hàng thành công');
        }
        else{
            return redirect()->back()->with('fail', 'Có lỗi xảy ra');
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

            $product = Products::where('id', $order_detail->product_id)->first();
            $product->quantity -= $order_detail->amount;
            $product->save();
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
        $soluongtrongkho = $this->checkSoLuongTrongKho($id);
        if($soluongtrongkho <= 0){
            return redirect()->back()->with('fail', 'Thêm sản phẩm không thành công, trong kho chỉ còn '.$soluongtrongkho);
        }
        if ($cart != null)
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
        return redirect()->back()->with('themgiohangthanhcong', 'Sản phẩm đã thêm thành công!');
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
        return redirect()->back()->with('success', 'Sản phẩm đã sửa thành công!');
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
        return redirect()->back()->with('success', 'Sản phẩm đã xoá thành công!');
        //        $product = session::forget('cart', $key['id'])->first();
        //        $product->destroy($key['id']);

    }
    public function deleteCarts(Request $request){
        dd($request);
    }
}
