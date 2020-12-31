<?php

namespace Modules\Sale\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Warehouse\Entities\Warehouse;
use Modules\Product\Entities\Product;
use SebastianBergmann\Environment\Console;
use Modules\Customer\Entities\Customer;
use Modules\ParchaseStatus\Entities\PurchaseStatus;
use Modules\OrderTax\Entities\OrderTax;
use Modules\User\Entities\User;
use Modules\Sale\Entities\SaleProductDetails;
use Modules\Sale\Entities\SaleProductInvoiceDetail;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('sale::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $customers = Customer::all();
        $purchasestatus = PurchaseStatus::all();
        $ordertax = OrderTax::all();
        $users = User::all();
        return view('sale::create',compact('warehouses','customers', 'purchasestatus','ordertax', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $sale = new SaleProductInvoiceDetail;
        $sale->referent_no = $request->referent_no;
        $sale->warehouse_id = $request->warehouse;
        $sale->customer_id = $request->customer;
        $sale->user_id = $request->user;
        $sale->order_tax_id = $request->order_tax_id;
        $sale->order_discount = $request->order_discount;
        $sale->order_shipping_cost = $request->order_shipping_cost;
        $sale->sale_document = $request->sale_document;
        $sale->sale_status_id = $request->sale_status_id;
        $sale->payment_status_id = $request->payment_status_id;
        $sale->paid_by_id = $request->paid_by_id;
        $sale->paying_amount = $request->paying_amount;
        $sale->charge = $request->charge;
        $sale->payment_note = $request->payment_note;
        $sale->sale_note = $request->sale_note;
        $sale->staff_note = $request->staff_note;
        $sale->items = $request->items;
        $sale->total = $request->total;
        $sale->order_tax = $request->totalOrderTax;
        $sale->grand_total = $request->grand_total;

        
      
       
        //$sale->status = $request->status;
        // $sale->save();
        //     $sale_id=$sale->id;
        if ($request->hasfile('document')) {
            $file = $request->file('document');
            $extention = $file->getClientOriginalExtension();
            $filename = date('mdYHis') . uniqid() . '.' . $extention;
            $file->move('upload/sale_documents/', $filename);
            $sale->sale_document = $filename;
        } else {
            //return $request;
            $sale->sale_document = "";
        }
     
        $save = $sale->save();
        // print_r( $save);die();
        if ($save) {
            return Response::json(array('success' => 'true', 'message' => 'Product has been added succesefully.'));
        } else {
            return Response::json(array('success' => 'false', 'message' => 'Product has not been added succesefully.'));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('sale::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sale::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
