<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function CustomerList(){
        $customer = Customer::orderBy('id','DESC')->get();
        return view('management.customer.customer_list', compact('customer'));
    }

    public function AddcustomerList(){
        return view('management.customer.add_customer_list');
    }

    public function CustomerStore(Request $request){

        $customer = New Customer;
        $customer->customer_group = $request->customer_group;
        $customer->name = $request->name;
        $customer->company_name = $request->company_name;
        $customer->tax_number = $request->tax_number;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->balace = $request->balace;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('customer.list')->with('message' , 'Customer Added Successfully');
    }

    public function CustomerEdit ($id){
        $customer = Customer::where('id', $id)->first();
        return view('management.customer.customer_edit', compact('customer'));
    }

    public function CustomerUpdate(Request $request){
        $customer = Customer::find($request->id);
        $customer->customer_group = $request->customer_group;
        $customer->name = $request->name;
        $customer->company_name = $request->company_name;
        $customer->tax_number = $request->tax_number;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->balace = $request->balace;
        $customer->address = $request->address;
        $customer->save();
        return redirect()->route('customer.list')->with('message' , 'Customer Updated Successfully');
    }

    public function CustomerDelete($id){
        $customer = Customer::find($id);
        $customer->delete();
        return back()->with('message' , 'Customer Updated Successfully');
    }
}
