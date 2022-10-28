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
                if ($user->role != 1) {
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

        if (Auth::attempt($data, $remember)) {
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
        $product = products::where('status', 1)->orderBy('id','DESC')->paginate(5);
        //   $product = products::SimplePaginate(5)::where('status', 1);
        return view('admin.products.list', ['product' => $product]);
    }
    public function getAddProduct()
    {   $supplier = Supplier::all();
        $category = categories::all();
        return view('admin.products.add', ['category' => $category,'suppliers'=>$supplier]);
    }

    public function postAddProduct(Request $request)
    {
        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            $filename = $file->getClientOriginalName('productImage');
            $file->move('img/products', $filename);
            $product = new products();
            $product->name = $request->productName;
            $product->description     = $request->productDescription;
            $product->quantity = $request->productQuantity;
            $product->price = $request->productPrice;
            $product->image = $filename;
            $product->category_id = $request->productCategoryID;
            $product->status = 1;
            $product->id_supplier = $request -> supplierID;
            $product->save();
            return  redirect('admin/product/add')->with('themthanhcong', 'success');
        } else {
            return  redirect('admin/product/list')->with('chuacofile', 'success');
        }
    }

    public function getEditProduct($id)
    {

        $product = products::find($id);
        $category = categories::all();
        $supplier = Supplier::all();
        return view('admin.products.edit', ['product' => $product, 'category' => $category,'suppliers' => $supplier]);
    }

    public function postEditProduct(Request $request)
    {
        $id = $request->id;
        $product = products::find($id);
        var_dump($product);
        $product->name = $request->productName;
        $product->description     = $request->productDescription;
        $product->quantity = $request->productQuantity;
        $product->price = $request->productPrice;
        $product->category_id = $request->productCategoryID;
        $product->id_supplier = $request -> supplierID;
        if ($request->hasFile('productImage')) {
            $file = $request->file('productImage');
            $filename = $file->getClientOriginalName('productImage');
            $file->move('img/products', $filename);
            $product->image = $filename;
        } else { // trường hợp không thay đổi ảnh
            $product->image = $request->productImage2;
        }
        $product->save();
        return  redirect('admin/product/edit/' . $id)->with('suathanhcong', 'success');
    }

    public function deleteProduct($id)
    {
        $product = products::find($id);
        $product->status = 0;
        $product->save();
        return redirect('admin/product/list')->with('xoathanhcong', 'success');
    }

    public function searchProduct(Request $request){
        $product = products::where('status', 1)->where('name', 'LIKE', '%'.$request->searchName.'%')->orderBy('id','DESC')->SimplePaginate(10);
        //$product = products::SimplePaginate(5)::where('status', 1);
        return view('admin.products.search', ['product' => $product]);
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
    /////////////////////////////////////////////////////////////////////////////
    ///                                                                       ///
    ///                               ORDER                                   ///
    ///                                                                       ///
    /////////////////////////////////////////////////////////////////////////////

    public function getListOrder()
    {
        $partners = Partners::all();
        $order = Orders::orderBy('id','DESC')->paginate(5);
        return view('admin.order.list', ['order' => $order, 'partners' => $partners]);
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
        return view('admin.order.edit', ['order' => $order]);
    }
    public function postEditOrder(Request $request)
    {
        $id = $request->idOrder;
        $status = $request->status;
        echo $id;
        $order = Orders::find($id);
        $order->status = $status;
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
        $partners = Partners::all();
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
