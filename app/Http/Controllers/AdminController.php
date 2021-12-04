<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    public function getlistcategory(){
        $category = categories::all();
        return view('admin.category.list',['category' => $category]);
    }
    public function getaddcategory(){
        return view('admin.category.add');
    }
    public function postaddcategory(Request $request){
        $this -> validate($request,
        ['namecategory' => 'required|min:3|max:100'
        ],
        [
            'namecategory.required' => 'Bạn chưa nhập tên thể loại',
            'namecategory.min' =>'Tên thể loại có độ dài từ 3 - 100 kí tự',
            'namecategory.max' =>'Tên thể loại có độ dài từ 3 - 100 kí tự'
        ]);
        $cate = new categories();
        $cate -> name = $request -> namecategory;
        $cate -> save();
        return redirect('admin/category/add') -> with('themthanhcong','success');
    }

    public function geteditcategory($id){
        $category = categories::find($id);
        return view('admin.category.edit',['category' => $category]);
    }

    public function posteditcategory(Request $request){
        $this -> validate($request,
            ['namecategory' => 'required|min:3|max:100'
            ],
            [
                'namecategory.required' => 'Bạn chưa nhập tên thể loại',
                'namecategory.min' =>'Tên thể loại có độ dài từ 3 - 100 kí tự',
                'namecategory.max' =>'Tên thể loại có độ dài từ 3 - 100 kí tự'
            ]);
        $id = $request-> id;
        $category = categories::find($id);
        $category -> name = $request -> namecategory;
        $category -> save();
        return redirect('admin/category/edit/'.$id) -> with('suathanhcong','success');
    }

    public function deletecategory($id){
        $category = categories::find($id);
        $category -> delete();
        return redirect('admin/category/list') -> with('xoathanhcong','success');
    }




    /////////////////////////////////////////////////////////////////////////////
    ///
    ///     PRODUCT
    ///
    public function getlistproduct(){
        $product = products::all();
        return view('admin.products.list',['product' => $product]);
    }
    public function getaddproduct(){
        $category = categories::all();

        return view('admin.products.add',['category' => $category]);
    }
    public function postaddproduct(Request $request){
       if($request -> hasFile('productImage')){
            $file = $request -> file('productImage');
            $filename = $file ->getClientOriginalName('productImage');
            $file -> move('img/products',$filename);
            $product = new products();
            $product -> name = $request -> productName;
            $product -> description	 = $request -> productDescription;
            $product -> quantity = $request -> productQuantity;
            $product -> price = $request -> productPrice;
            $product -> image = $filename;
            $product -> category_id = $request -> productCategoryID;
            $product -> save();
           return  redirect('admin/product/add') -> with('themthanhcong','success');
       }
       else{
         return  redirect('admin/product/list') -> with('chuacofile','success');
        }

    }
    public function geteditproduct($id){
        $product = products::find($id);
        $category = categories::all();
        return view('admin.products.edit',['product' => $product, 'category' =>$category]);
    }

    public function posteditproduct(Request $request){
        $id =$request -> id;
        $product = products::find($id);
        var_dump($product);
        $product -> name = "test";
        $product -> description	 = $request -> productDescription;
        $product -> quantity = $request -> productQuantity;
        $product -> price = $request -> productPrice;
        $product -> category_id = $request -> productCategoryID;
        if($request -> hasFile('productImage')){
            $file = $request -> file('productImage');
            $filename = $file ->getClientOriginalName('productImage');
            $file -> move('img/products',$filename);
            $product -> image = $filename;
        }
        else{ // trường hợp không thay đổi ảnh
            $product -> image = $request -> productImage2;
        }
        $product -> save();
        return  redirect('admin/product/edit/'.$id) -> with('suathanhcong','success');
    }
    public function deleteproduct($id){
        $product = products::find($id);
        $product -> delete();
        return redirect('admin/product/list') -> with('xoathanhcong','success');
    }


}
