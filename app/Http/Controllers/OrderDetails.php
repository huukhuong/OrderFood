<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImportDetails;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetails extends Controller
{
//    public function getEditOrderDetails($id){
//        $orderDetails = Orderdetail::where('id',$id)->first();
//        $products = Products::all();
//        return view('admin.orderdetails.edit',['orderDetails' => $orderDetails, 'products' => $products]);
//    }

    public function getEditOrderDetails($id1,$id2){
        $orderDetails = Orderdetail::where('order_id',$id1)->where('product_id',$id2)->first();
        $products = Products::all();
        return view('admin.orderdetails.edit',['orderDetails' => $orderDetails, 'products' => $products]);
    }

    public function getDelete($id1,$id2){
        $orderDetails = Orderdetail::where('order_id',$id1)->where('product_id',$id2)->delete();
        return redirect()->back();
    }

    public function postEditOrderDetails(Request $request){
        $id = $request -> idOrder;
        $orderDetail = Orderdetail::where('order_id',$id)->where('product_id',$request ->productID)->first();
       // $orderDetail -> product_id = $request ->productID;
        $soluongtrongkho = $this->checkSoLuongTrongKho( $request ->productID);
        if($request -> amount > $soluongtrongkho){
            return redirect()->back()->with('fail', 'Thêm không thành công,trong kho chỉ còn ' .$soluongtrongkho);
        }
       // $orderDetail -> amount = $request -> amount;
       // $orderDetail -> price = $request -> productPrice;
        //$orderDetail -> save();
        DB::table('order_detail')
            ->where('order_id', $id)
            ->where('product_id', $request ->productID)
            ->update(['amount' => $request -> amount,'price' => $request -> productPrice]);
        $this -> updateOrderTotal($id);
        $this -> updateSoLuongKho($request ->productID,$request -> amount);
        return redirect()->back()->with('success', 'Sửa thành công rồi');
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

    public function checkSoLuongTrongKho($id){
        $product = Products::where('id',$id)->first();
        if($product != null){
            return $product -> quantity;
        }
        return 0;
    }

    public function updateSoLuongKho($id,$sl){
        $product = Products::find($id);
        $oldQuantity =  $product -> quantity;
        $newQuantity = $oldQuantity - $sl;
        $product -> quantity = $newQuantity;
        $product -> save();
    }

    public function postAddOrderDetails(Request $request){
        $id = $request -> idOrder;
        $orderDetail = new Orderdetail();
        $orderDetail -> order_id =  $id ;
        $orderDetail -> product_id = $request ->productID;
        $orderDetail -> amount = $request -> amount;
        $soluongtrongkho = $this->checkSoLuongTrongKho($orderDetail -> product_id);
        if($orderDetail -> amount > $soluongtrongkho){
            return redirect()->back()->with('fail', 'Thêm không thành công,trong kho chỉ còn ' .$soluongtrongkho);
        }
        $orderDetail -> price = $request -> productPrice;
        $orderDetail -> save();
        $this -> updateOrderTotal($id);
        $this -> updateSoLuongKho($request ->productID,$orderDetail -> amount);
        return redirect()->back()->with('success', 'Thêm thành công rồi');
    }
}
