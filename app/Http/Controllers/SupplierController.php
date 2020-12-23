<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function SupplierList(){
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        return view('management.supplier.supplier_list', compact('suppliers'));
    }

    public function AddSupplierList(){
        return view('management.supplier.add_supplier_list');
    }

    public function SupplierStore(Request $request){
        $supplier = New Supplier;
        $supplier->name = $request->name;
        $supplier->company_name = $request->company_name;
        $supplier->vat_number = $request->vat_number;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->state = $request->state;
        $supplier->postal_code = $request->postal_code;
        $supplier->country = $request->country;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/supplier_images/'.$supplier->image));
            $filename =date('YmdHi').$file->getClientORiginalName();
            $file->move(public_path('upload/supplier_images'), $filename);
            $supplier['image'] = $filename;
        }
        $supplier->save();
        return redirect()->route('supplier.list')->with('message' , 'Customer Added Successfully');
    }

    public function SupplierEdit ($id){
        $supplier = Supplier::where('id', $id)->first();
        return view('management.customer.customer_edit', compact('customer'));
    }

    public function SupplierUpdate(Request $request){
        $supplier = Supplier::find($request->id);
        $supplier->customer_group = $request->customer_group;
        $supplier->name = $request->name;
        $supplier->company_name = $request->company_name;
        $supplier->tax_number = $request->tax_number;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->balace = $request->balace;
        $supplier->address = $request->address;
        $supplier->save();
        return redirect()->route('customer.list')->with('message' , 'Customer Updated Successfully');
    }

    public function SupplierDelete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return back()->with('message' , 'Customer Updated Successfully');
    }
}
