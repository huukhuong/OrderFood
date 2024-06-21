<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getListSupplier()
    {
        $suppliers = Supplier::where('status', '1')->paginate(5);
        return view('admin.supplier.list', ['suppliers' => $suppliers]);
    }

    public function getAddSupplier()
    {
        return view('admin.supplier.add');
    }

    public function postAddSupplier(Request $request)
    {   $supplier = new Supplier();
        $supplier -> name = $request -> supplierName;
        $supplier -> address = $request -> supplierAddress;
        $supplier -> description = $request->supplierDescription;
        $supplier -> contact = $request -> supplierContact;
        $supplier -> status = 1;
        $supplier -> created_at = date('Y-m-d H:i:s');
        $supplier -> updated_at = date('Y-m-d H:i:s');
        $supplier -> save();
        return redirect('admin/supplier/list')->with('themthanhcong', 'success');
    }

    public function getEditSupplier($id)
    {
        $supplier = Supplier::find($id);
        if (!is_null($supplier)) {
            return view('admin.supplier.edit', ['supplier' => $supplier]);
        }
    }

    public function postEditSupplier(Request $request)
    {   $id = $request -> supplierId;
        $supplier = Supplier::find($id);
        $supplier -> name = $request -> supplierName;
        $supplier -> address = $request -> supplierAddress;
        $supplier -> description = $request->supplierDescription;
        $supplier -> contact = $request -> supplierContact;
        $supplier -> updated_at = date('Y-m-d H:i:s');
        $supplier -> save();
        return redirect('admin/supplier/edit/' . $id)->with('suathanhcong', 'success');
    }

    public function deleteSupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->status = 0;
        $supplier->save();
        return redirect('admin/supplier/list')->with('xoathanhcong', 'success');
    }

    public function searchSupplier(Request $request)
    {

    }
}
