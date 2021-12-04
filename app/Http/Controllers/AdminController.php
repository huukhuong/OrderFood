<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;

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
}
