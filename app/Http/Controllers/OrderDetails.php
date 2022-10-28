<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderDetails extends Controller
{
    public function getEditOrderDetails($id){
        $orderDetails = Orderdetail::where('order_id',$id)->first();
        $products = Products::all();
        return view('admin.orderdetails.edit',['orderDetails' => $orderDetails, 'products' => $products]);
    }

    public function updateOrderTotal($id){
        $orderDetails = Orderdetail::where('order_id', $id )->get();
        $sum = 0;
        foreach ($orderDetails as $item){
            $total = $item -> amount * $item -> price;
            $sum += $total;
        }
        $order = Orders::find($id);
        $order -> total = $sum;
        $order -> save();
    }

    public function postAddOrderDetails(Request $request){
        $id = $request -> idOrder;
        $orderDetail = new Orderdetail();
        $orderDetail -> order_id =  $id ;
        $orderDetail -> product_id = $request ->productID;
        $orderDetail -> amount = $request -> amount;
        $orderDetail -> price = $request -> productPrice;
        $orderDetail -> save();
        $this -> updateOrderTotal($id);
        return redirect()->back();
    }
}
