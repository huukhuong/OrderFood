<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\ImportDetails;
use App\Models\Orderdetail;
use App\Models\Orders;
use App\Models\Partners;
use App\Models\Products;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function getListImport()
    {
        $imports = Import::query();
        $imports = $imports->paginate(5);
        return view('admin.import.list', ['imports' => $imports]);
    }

    public function getAddImport()
    {
        $suppliers = Supplier::all();
        $products = Products::all();
        $users = User::all();
        return view('admin.import.add', ['suppliers' => $suppliers, 'users' => $users, 'products' => $products]);
    }

    public function getProductPrice($id)
    {
        $products = Products::find($id);
        return $products->price;
    }

    public function updateQuantityProduct($productID, $amount ,$type)
    {
        $product = Products::find($productID);
        $oldQuantity = $product -> quantity;
        if($amount === $oldQuantity){
            return ;
        }
        if ($type === "add" ) {
            $product -> quantity = $oldQuantity + $amount;
        } else if ($type === "del") {
            $product -> quantity = $oldQuantity - $amount;
        }
        $product -> save();
    }

    public function postAddImport(Request $request)
    {
        $import = new Import();
        $import->user_id = $request->userId;
        $import->total = 0;
        $import->description = $request->importDescription;
        $import->created_at = date('Y-m-d H:i:s');
        $import->status = 1;
        $import -> supplier_id = $request -> supplierID;
        $import->save();
        $import_id = $import->id;
        $products = $request->productID;
        $quantities = $request->quantity;
        $size = sizeof($products);
        $sum = 0;
        for ($i = 0; $i < $size; $i++) {
            $productId = $products[$i];
            $price = $this->getProductPrice($productId);
            $amount = $quantities[$i];
            $import_details = new ImportDetails();
            $import_details->import_id = $import_id;
            $import_details->product_id = $productId;
            $import_details->amount = $amount;
            $import_details->save();
            $sum += ($amount * $price);
            // cập nhật thêm số lượng sản phẩm vào kho
            $this->updateQuantityProduct($productId,$amount,'add');
        }
        $import->total = $sum;
        $import->save();
        return redirect()->back();
    }

    public function getDetailImport($id)
    {
        $users = User::all();
        $import_details = ImportDetails::where('import_id',$id)->get();
        $import = Import::find($id);
        $products = Products::all();
        return view('admin.import.importdetails', ['users'=>$users,'import' => $import, 'import_details' => $import_details, 'products' => $products]);


    }

    public function getEditImport($id)
    {
        $users = User::all();
        $import_details = ImportDetails::where('import_id',$id)->get();
        $import = Import::find($id);
        $products = Products::where('id_supplier',$import->supplier_id)->get();
        return view('admin.import.edit', ['users'=>$users,'import' => $import, 'importdetails' => $import_details, 'products' => $products]);

    }

    public function postEditImport(Request $request)
    {
        $import = Import::find($request->importID);
        $import->user_id = $request->userId;
        $import->total = 0;
        $import->description = $request->importDescription;
        $import->updated_at = date('Y-m-d H:i:s');
        $import->status = 1;
        $import -> supplier_id = $request -> supplierID;
        $import->save();
        $import_id = $import->id;
        $importDetails = ImportDetails::where('import_id',$import_id)->get();
        $sum = 0;
        foreach ($importDetails as $key){
            $price = $this->getProductPrice($key -> product_id);
            $amount = $key -> amount;
            $sum+= $price * $amount;
            $this->updateQuantityProduct($key -> product_id,$amount,'add');
        }
        $import->total = $sum;
        $import->save();
        return redirect()->back();
    }

    public function searchImports()
    {

    }

    public function getPrint($id)
    {
        $order = Import::find($id);
        $orderdetails = ImportDetails::where('import_id', $id)->get();
        $products = Products::all();
        return view('admin.import.print', ['order' => $order,  'orderdetails' => $orderdetails, 'products' => $products]);

    }
}
