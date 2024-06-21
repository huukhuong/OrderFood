<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\ImportDetails;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportDetailsController extends Controller
{
    public function updateQuantityProduct($productID, $amount ,$type)
    {
        $product = Products::find($productID);
        $oldQuantity = $product -> quantity;
        if($oldQuantity == $amount){
            return;
        }
        if ($type === "add") {
            $product -> quantity = $oldQuantity + $amount;
        } else if ($type === "del") {
            $product -> quantity = $oldQuantity - $amount;
        }
        $product -> save();
    }

    public function updateImportTotal($id){
        $importDetails = ImportDetails::where('import_id', $id )->get();
        $sum = 0;
        foreach ($importDetails as $item){
            $total = $item -> amount * $item -> products_linked -> price_import;
            $sum += $total;
        }
        $order = Import::find($id);
        $order -> total = $sum;
        $order -> save();
    }
    public function postAddDetails(Request $request){
        $importDetais = new ImportDetails();
        $importDetais-> import_id = $request -> idImport;
        $importDetais-> product_id = $request ->  productID;
        $importDetais-> amount  = $request ->  amount;
        $importDetais-> created_at  = date('Y-m-d H:i:s');
        $importDetais -> save();
        $this -> updateQuantityProduct($request ->  productID,$request ->  amount,'add');
        $this -> updateImportTotal($request -> idImport);
        return redirect()->back();
    }

    public function getEditDetail($id1,$id2){

        $importDetails = ImportDetails::where('import_id',$id1)->where('product_id',$id2)->first();
        $product = Products::all();
        return view('admin.importdetails.edit',['importDetails'=>$importDetails,'products' => $product]);
    }

    public function postEditDetails(Request $request){
        DB::table('imports_details')
            ->where('import_id', $request ->idImport)
            ->where('product_id', $request ->productID)
            ->update(['amount' => $request -> amount]);
        $this->updateImportTotal($request ->idImport);
        $this->updateQuantityProduct($request ->productID,$request -> amount,'add');
        return redirect()->back()->with('success', 'Sửa thành công rồi');
//        $importDetais-> import_id = $request -> idImport;
//        $importDetais-> product_id = $request ->  productID;
//        $importDetais-> amount  = $request ->  amount;
    }

    public function getDelete($id1,$id2){
        $temp =  ImportDetails::where('import_id',$id1)->where('product_id',$id2) ->first();
        $importDetails = ImportDetails::where('import_id',$id1)->where('product_id',$id2)->delete();
        $this -> updateQuantityProduct($id2 ,$temp ->  amount,'del');
        $this -> updateImportTotal($id1);
        return redirect()->back();
    }
}
