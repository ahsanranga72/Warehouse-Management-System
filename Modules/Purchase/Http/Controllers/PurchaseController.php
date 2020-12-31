<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Warehouse\Entities\Warehouse;
use Modules\Product\Entities\Product;
use SebastianBergmann\Environment\Console;
use Modules\Supplier\Entities\Supplier;
use Modules\ParchaseStatus\Entities\PurchaseStatus;
use Modules\OrderTax\Entities\OrderTax;
use DB;
use Modules\Purchase\Entities\PurchaseProductInvoiceDetails;
use Modules\Purchase\Entities\PurchaseProductDetails;
use Response;


class PurchaseController extends Controller
{


  
    public function index()
    {
        $purchaselists = PurchaseProductInvoiceDetails::orderBy('id', 'DESC')->get();
        return view('purchase::index', compact('purchaselists'));
    }

  
    public function create()
    {
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::all();
        $purchasestatus = PurchaseStatus::all();
        $ordertax = OrderTax::all();
        return view('purchase::create', compact('warehouses', 'suppliers', 'purchasestatus', 'ordertax'));
    }
    public function get_product_list_by_product_code(Request $request)
    {
        if ($request->get('product_code') && $request->get('warehouse_id') != null) {
            $product_code = $request->get('product_code');
            $warehouse_id = $request->get('warehouse_id');

            $data = DB::table('products')->where('warehouse_id', $warehouse_id)->where('product_code', 'LIKE', "%{$product_code}%")->get();
            $output = '<ul class="dropdown-menu select-product-list" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
                        <li data-product=' . $row->id . '><a href="#">' . $row->product_code . ' - ' . $row->product_name . '</a></li>';
            }
            $output .= '</ul>';
            echo $output;
            exit(0);
        }
    }

    public function get_product_by_id(Request $request)
    {
        if ($request->get('product_id')) {
            $product_id = $request->get('product_id');
            $data['product'] = Product::where('id', $product_id)->get()->first();
            return view('purchase::orderlist', $data);
            exit(0);
        }
    }
   
    public function storePurchase(Request $request)
    {
        $purchase = new PurchaseProductInvoiceDetails;
        $purchase->warehouse_id = $request->warehouse;
        $purchase->supplier_id = $request->supplier;
        $purchase->purchase_status_id = $request->purchaseStatus;
        $purchase->order_tax_id = $request->orderTax;
        $purchase->note = $request->note;
        $purchase->items = $request->items;
        $purchase->total = $request->total;
        $purchase->order_tax = $request->totalOrderTax;
        $purchase->order_discount = $request->orderDiscount;
        $purchase->order_shipping_cost = $request->shippingCost;
        $purchase->grand_total = $request->grandTotal;


        if ($request->hasfile('document')) {
            $file = $request->file('document');
            $extention = $file->getClientOriginalExtension();
            $filename = date('mdYHis') . uniqid() . '.' . $extention;
            $file->move('upload/purchase_documents/', $filename);
            $purchase->purchase_document = $filename;
        } else {
            $purchase->purchase_document = "";
        }

        $save = $purchase->save();
        $purchase_id = $purchase->id;

        $data = json_decode($request->products);
        foreach ($data as $mydata) {
            $purchaseProductDetails = new PurchaseProductDetails;
            $purchaseProductDetails->product_id = $mydata->product_id;
            $purchaseProductDetails->quantity = $mydata->quantity;
            if ($mydata->received != '') {
                $purchaseProductDetails->received_quantity = $mydata->received;
            }

            $purchaseProductDetails->subtotal = $mydata->subtotal;
            $purchaseProductDetails->purchase_product_invoice_id = $purchase_id;
            $purchaseProductDetails->save();


            $product = Product::where('id', $mydata->product_id)->first();
            if ($mydata->received != '' && $mydata->received > 0){
                $product->stock_quantity = $product->stock_quantity + $mydata->received;
            } else {
                $product->stock_quantity = $product->stock_quantity + $mydata->quantity;
            }
            
            $product->save();
        }
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
        return view('purchase::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('purchase::edit');
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
