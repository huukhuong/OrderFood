<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Partners;
use App\Models\products;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            if ($user != null) {
                if ($user->role == 0) {
                    $this->logout();
                    return redirect('admin');
                }
            }
            return $next($request);
        });
    }

    public function login()
    {
        return view('admin.auth.login');
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
            'role' => 1
        ];

        $data2 = [
            'email' => $email,
            'password' => $password,
            'role' => 2
        ];

        $data3 = [
            'email' => $email,
            'password' => $password,
            'role' => 3
        ];

        if (Auth::attempt($data, $remember) || Auth::attempt($data2, $remember) || Auth::attempt($data3, $remember)) {
            return redirect('admin');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Sai thông tin đăng nhập']);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function getListCategory()
    {
        $category = categories::where('status', 1)->get();
        return view('admin.category.list', ['category' => $category]);
    }

    public function getAddCategory()
    {
        return view('admin.category.add');
    }

    public function postAddCategory(Request $request)
    {
        $this->validate(
            $request,
            [
                'namecategory' => 'required|min:3|max:100'
            ],
            [
                'namecategory.required' => 'Bạn chưa nhập tên danh mục',
                'namecategory.min' => 'Tên danh mục có độ dài từ 3 - 100 kí tự',
                'namecategory.max' => 'Tên danh mục có độ dài từ 3 - 100 kí tự'
            ]
        );
        $cate = new categories();
        $cate->name = $request->namecategory;
        $cate->save();
        return redirect('admin/category/add')->with('themthanhcong', 'success');
    }

    public function getEditCategory($id)
    {
        $category = categories::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function postEditCategory(Request $request)
    {
        $this->validate(
            $request,
            [
                'namecategory' => 'required|min:3|max:100'
            ],
            [
                'namecategory.required' => 'Bạn chưa nhập tên danh mục',
                'namecategory.min' => 'Tên danh mục có độ dài từ 3 - 100 kí tự',
                'namecategory.max' => 'Tên danh mục có độ dài từ 3 - 100 kí tự'
            ]
        );
        $id = $request->id;
        $category = categories::find($id);
        $category->name = $request->namecategory;
        $category->save();
        return redirect('admin/category/edit/' . $id)->with('suathanhcong', 'success');
    }

    public function deleteCategory($id)
    {
        $category = categories::find($id);
        $category->status = 0;
        $category->save();
        return redirect('admin/category/list')->with('xoathanhcong', 'success');
    }



    /////////////////////////////////////////////////////////////////////////////
    ///                                                                       ///
    ///                                 PRODUCT                               ///
    ///                                                                       ///
    /////////////////////////////////////////////////////////////////////////////
    public function getListProduct()
    {
        $product = products::where('status', 1)->orderBy('id', 'DESC')->paginate(5);
        $supplier = Supplier::where('status', 1)->get();
        $categories = Categories::where('status', 1)->get();
        //   $product = products::SimplePaginate(5)::where('status', 1);
        return view('admin.products.list', ['product' => $product, 'supplier' => $supplier, 'categories' => $categories]);
    }

    public function getAddProduct()
    {
        $supplier = Supplier::all();
        $category = categories::all();
        return view('admin.products.add', ['category' => $category, 'suppliers' => $supplier]);
    }

    public function postAddProduct(Request $request)
    {
        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            $filename = $file->getClientOriginalName('productImage');
            $file->move('img/products', $filename);
            $product = new products();
            $product->name = $request->productName;
            $product->description = $request->productDescription;
            $product->quantity = $request->productQuantity;
            $product->price = $request->productPrice;
            $product->image = $filename;
            $product->category_id = $request->productCategoryID;
            $product->status = 1;
            $product->id_supplier = $request->supplierID;
            $product->save();
            return redirect('admin/product/add')->with('themthanhcong', 'success');
        } else {
            return redirect('admin/product/list')->with('chuacofile', 'success');
        }
    }

    public function getProduct($id)
    {
        $product = products::find($id);
        return response()->json($product);
    }

    public function getProductBySupplier($id){
        $product = products::where('id_supplier',$id)->get();
        return response()->json($product);
    }

    public function getEditProduct($id)
    {

        $product = products::find($id);
        $category = categories::all();
        $supplier = Supplier::all();
        return view('admin.products.edit', ['product' => $product, 'category' => $category, 'suppliers' => $supplier]);
    }

    public function postEditProduct(Request $request)
    {
        $id = $request->id;
        $product = products::find($id);
        var_dump($product);
        $product->name = $request->productName;
        $product->description = $request->productDescription;
        $product->quantity = $request->productQuantity;
        $product->price = $request->productPrice;
        $product->category_id = $request->productCategoryID;
        $product->id_supplier = $request->supplierID;
        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            $filename = $file->getClientOriginalName('productImage');
            $file->move('img/products', $filename);
            $product->image = $filename;
        } else { // trường hợp không thay đổi ảnh
            $product->image = $request->productImage2;
        }
        $product->save();
        return redirect('admin/product/edit/' . $id)->with('suathanhcong', 'success');
    }

    public function deleteProduct($id)
    {
        $product = products::find($id);
        $product->status = 0;
        $product->save();
        return redirect('admin/product/list')->with('xoathanhcong', 'success');
    }

    public function searchProduct(Request $request)
    {
        $product = Products::query();
        if ($request->has('searchName') && !is_null($request->searchName)) {
            $product->where('name', 'LIKE', '%' . $request->searchName . '%');
        }
        if ($request->has('category') && !is_null($request->category)) {
            $product->where('category_id', $request->category);
        }
        if ($request->has('supplier') && !is_null($request->supplier)) {
            $product->where('id_supplier', $request->supplier);
        }
        $products = $product->where('status', 1)->paginate(5);
        $supplier = Supplier::where('status', 1)->get();
        $categories = Categories::where('status', 1)->get();

        return view('admin.products.search', ['product' => $products, 'supplier' => $supplier, 'categories' => $categories]);
//        ->orderBy('id','DESC')->SimplePaginate(10)

    }


    /////////////////////////////////////////////////////////////////////////////
    ///                                                                       ///
    ///                                USER                                   ///
    ///                                                                       ///
    /////////////////////////////////////////////////////////////////////////////

    public function getListUser()
    {
        $user = User::all();
        return view('admin.user.list', ['user' => $user]);
    }

    public function getAddUser()
    {
        return view('admin.user.add');
    }

    public function postAddUser(Request $request)
    {
        $user = new User();
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->password = bcrypt("123456");
        $user->phone = $request->userPhone;
        $user->address = $request->userAddress;
        $user->status = $request->userStatus;
        $user->role = $request->userRole;
        $user->img = 'default.png';
        $user->save();
        return redirect('admin/user/list')->with('themthanhcong', 'success');
    }

    public function blockUser($id)
    {
        $user = User::find($id);
        if ($user->status == 1) {
            $user->status = 0;
            $user->save();
            return redirect('admin/user/list')->with('khoathanhcong', 'success');
        } else {
            $user->status = 1;
            $user->save();
            return redirect('admin/user/list')->with('mokhoathanhcong', 'success');
        }
    }

    public function resetPass($id)
    {
        $user = User::find($id);
        $user->password = bcrypt('123456');
        $user->save();
        return redirect('admin/user/list')->with('resetthanhcong', 'success');
    }

    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function postEditUser(Request $request)
    {
        $userId = $request->userId;
        $user = User::find($userId);
        $user->name = $request->userName;
        $user->email = $request->userEmail;
        $user->phone = $request->userPhone;
        $user->address = $request->userAddress;
        $user->status = $request->userStatus;
        $user->role = $request->userRole;
        $user->save();
        return redirect()->back();
    }
    /////////////////////////////////////////////////////////////////////////////
    ///                                                                       ///
    ///                               ORDER                                   ///
    ///                                                                       ///
    /////////////////////////////////////////////////////////////////////////////

    public function getListOrder()
    {
        $partners = Partners::all();
        $order = Orders::orderBy('id', 'DESC')->paginate(5);
        return view('admin.order.list', ['order' => $order, 'partners' => $partners]);
    }

    public function getAddOrder()
    {
        $partners = Partners::all();
        $users = User::all();
        $products = Products::all();
        return view('admin.order.add', ['partners' => $partners, 'users' => $users, 'products' => $products]);
    }

    public function getProductPrice($id)
    {
        $products = Products::find($id);
        return $products->price;
    }

    public function postAddOrder(Request $request)
    {
        $order = new Orders();
        $order->user_id = $request->userId;
        $order->address = $request->orderAddress;
        $order->total = 0;
        $order->phone = $request->orderPhone;
        $order->description = $request->orderDescription;
        $order->id_partner = $request->partnerId;
        $order->created_at = date('Y-m-d H:i:s');
        $order->status = 1;
        $order->save();

        $order_id = $order->id;

        $products = $request->productID;
        $quantities = $request->quantity;
        $size = sizeof($products);
        $sum = 0;
        for ($i = 0; $i < $size; $i++) {
            $productId = $products[$i];
            $price = $this->getProductPrice($productId);
            $amount = $quantities[$i];
            $order_details = new Orderdetail();
            $order_details->order_id = $order_id;
            $order_details->product_id = $productId;
            $order_details->amount = $amount;
            $order_details->price = $price;
            $order_details->save();
            $sum += ($amount * $price);
        }
        $order->total = $sum;
        $order->save();
        return redirect()->back();

    }

    public function getDetailOrder($id)
    {
        $orderdetails = Orderdetail::where('order_id', $id)->get();
        $order = Orders::find($id);
        return view('admin.order.orderdetails', ['order' => $order, 'orderdetails' => $orderdetails]);
    }

    public function getEditOrder($id)
    {
        $order = Orders::find($id);
        $orderdetails = Orderdetail::where('order_id', $id)->get();
        $partners = Partners::all();
        $products = Products::all();
        return view('admin.order.edit', ['order' => $order, 'partners' => $partners, 'orderdetails' => $orderdetails, 'products' => $products]);
    }

    public function searchOrders(Request $request)
    {
        $order = Orders::query();
        if (!is_null($request->searchId) && is_numeric($request->searchId)) {
            $order->find($request->searchId);
        }
        if (!is_null($request->searchId) && !is_numeric($request->searchId)) {
            $user = User::where('name',$request->searchId)->first();
            $order->where('user_id',$user->id);
        }
        if (!is_null($request->startDay) && !is_null($request->endDay)) {
            $order->whereBetween('created_at',[$request->startDay,$request->endDay]);
        }
        $orders = $order ->orderByDesc('id')->paginate(5);
        $partners = Partners::all();
     //   $order = Orders::orderBy('id', 'DESC')->paginate(5);
        return view('admin.order.search', ['order' => $orders, 'partners' => $partners]);
    }

    public function getPrint($id){
        $order = Orders::find($id);
        $orderdetails = Orderdetail::where('order_id', $id)->get();
        $partners = Partners::all();
        $products = Products::all();
        return view('admin.order.print', ['order' => $order, 'partners' => $partners, 'orderdetails' => $orderdetails, 'products' => $products]);

    }

    public function postEditOrder(Request $request)
    {
        $id = $request->orderId;
        $order = Orders::find($id);
        $order->user_id = $request->orderIDCustommer;
        $order->user_id = 1;
        $order->address = $request->orderAddress;
        $order->phone = $request->orderPhone;
        $order->description = $request->orderDescription;
        $order->id_partner = $request->partnerId;
        $order->status = $request->orderStatus;
        $order->save();
        return redirect('admin/order/list')->with('capnhatdonhangthanhcong', 'success');
    }

    public function postSavePartners(Request $request)
    {
        $partners = $request->idpartner;
        $order = Orders::find($request->idorder);
        $order->id_partner = $request->idpartner;
        $order->status = 1;
        $order->save();
        return redirect('admin/order/list')->with('capnhatgiaohang', 'success');
    }

    /////////////////////////////////////////////////////////////////////////////
    ///                                                                       ///
    ///                               PARTNERS                                ///
    ///                                                                       ///
    /////////////////////////////////////////////////////////////////////////////
    public function getListPartners()
    {
        $partners = Partners::paginate(5);
        return view('admin.partners.list', ['partners' => $partners]);
    }

    public function getAddPartners()
    {
        return view('admin.partners.add');
    }

    public function postAddPartners(Request $request)
    {
        $partners = new Partners();
        $partners->name = $request->name;
        $partners->email = $request->email;
        $partners->phone = $request->phone;
        $partners->address = $request->address;
        $partners->save();
        return redirect('admin/partners/list')->with('themthanhcong', 'success');
    }
    /////////////////////////////////////////////////////////////////////////////
    ///                                                                       ///
    ///                               THỐNG KÊ                                ///
    ///                                                                       ///
    /////////////////////////////////////////////////////////////////////////////

    public function khoangthoigian()
    {
        $thongke = array();
        return view('admin.statistical.khoangthoigian', ['thongke' => $thongke]);
    }

    public function thongke1(Request $request)
    { // khoảng thời gian
        $thongke = DB::table('orders')
            ->select('products.name', 'products.price', 'order_detail.amount', 'orders.created_at')
            ->join('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->join('products', 'products.id', '=', 'order_detail.product_id')
            ->whereBetween('orders.created_at', [$request->ngaybatdau, $request->ngayketthuc])
            ->get();
        return view('admin.statistical.khoangthoigian', ['thongke' => $thongke]);
    }
}
