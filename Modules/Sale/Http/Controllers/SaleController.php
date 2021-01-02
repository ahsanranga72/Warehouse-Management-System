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
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleProductDetails;
use Modules\Sale\Entities\SaleProductInvoiceDetail;

use Response;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $salelists = SaleProductInvoiceDetail::orderBy('id', 'DESC')->get();
        return view('sale::index', compact('salelists'));
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
        $data = json_decode($request->products);
        $insert=true;$name="";
        foreach ($data as $mydata) {
            
            $product = Product::where('id', $mydata->product_id)->first();
           
            if( $product->stock_quantity < $mydata->quantity){
                $name=$product->product_name;
                $insert=false;
                break;
            }
          
        }

        if($insert){

        $sale = new SaleProductInvoiceDetail;
        $sale->referent_no = $request->reference_no;
        $sale->warehouse_id = $request->warehouse;
        $sale->customer_id = $request->customer_id;
        $sale->user_id = $request->biller;
        $sale->order_tax_id = $request->orderTax;
        $sale->order_discount = $request->orderDiscount;
        $sale->order_shipping_cost = $request->shippingCost;
        $sale->sale_status_id = $request->sale_status;
        $sale->payment_status_id = $request->payment_status;
        $sale->paid_by_id = $request->paid_by_id;
        if($request->receive_amount!=''){
            $sale->received_amount = $request->receive_amount;
        }
        if($request->paying_amount!=''){
            $sale->paying_amount = $request->paid_amount;
        }
         
        if($request->cheque_no!=''){
                $sale->cheque_number = $request->cheque_no;
        }
        if($request->payment_note !=''){
            $sale->payment_note = $request->payment_note;
        }
        if($request->sale_note != ''){
            $sale->sale_note = $request->sale_note;
        }
        if($request->stuff_note !=''){
            $sale->staff_note = $request->stuff_note;
        }
       
        
        $sale->items = $request->items;
        $sale->total = $request->total;
        $sale->order_tax = $request->totalOrderTax;
        $sale->grand_total = $request->grandTotal;

        if ($request->hasfile('document')) {
            $file = $request->file('document');
            $extention = $file->getClientOriginalExtension();
            $filename = date('mdYHis') . uniqid() . '.' . $extention;
            $file->move('upload/sale_documents/', $filename);
            $sale->sale_document = $filename;
        } else {
            $sale->sale_document = "";
        }

        $save = $sale->save();
        $sale_id = $sale->id;

        $data = json_decode($request->products);
        foreach ($data as $mydata) {
            $saleProductDetails = new SaleProductDetails;
            $saleProductDetails->product_id = $mydata->product_id;
            $saleProductDetails->quantity = $mydata->quantity;
            $saleProductDetails->subtotal = $mydata->subtotal;
            $saleProductDetails->sale_product_invoice_id = $sale_id;
            $saleProductDetails->save();


            $product = Product::where('id', $mydata->product_id)->first();
            $product->stock_quantity = $product->stock_quantity - $mydata->quantity;

            
            $product->save();
        }
        if ($save) {
            return Response::json(array('success' => true, 'message' => 'Product has been added succesefully.'));
        } else {
            return Response::json(array('success' => false, 'message' => 'Product has not been added succesefully.'));
        }

        }else{
            return Response::json(array('success' => false, 'message' => $name.' is out of stock'));
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
