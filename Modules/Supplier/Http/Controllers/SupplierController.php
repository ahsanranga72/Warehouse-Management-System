<?php

namespace Modules\Supplier\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Supplier\Entities\Supplier;

class SupplierController extends Controller
{
    public function SupplierList(){
        $suppliers = Supplier::orderBy('id', 'DESC')->get();
        return view('supplier::supplier.supplier_list', compact('suppliers'));
    }

    public function create(){
        return view('supplier::supplier.add_supplier_list');
    }

    public function store(Request $request){
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
        return redirect()->route('supplier.list')->with('message' , 'Supplier Added Successfully');
    }

    public function edit($id){
        $supplier = Supplier::find($id);
        return view('supplier::supplier.supplier_edit', compact('supplier'));
    }

    public function update(Request $request , $id){
        $supplier = Supplier::find($id);
        $supplier->customer_group = $request->customer_group;
        $supplier->name = $request->name;
        $supplier->company_name = $request->company_name;
        $supplier->tax_number = $request->tax_number;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->balace = $request->balace;
        $supplier->address = $request->address;
        $supplier->save();
        return redirect()->route('customer.list')->with('message' , 'Supplier Updated Successfully');
    }

    public function destroy($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return back()->with('message' , 'Supplier Updated Successfully');
    }
}
