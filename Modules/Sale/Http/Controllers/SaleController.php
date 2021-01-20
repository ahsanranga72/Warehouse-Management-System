<?php

namespace Modules\Sale\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Warehouse\Entities\WareHouse;
use Modules\Product\Entities\Product;
use SebastianBergmann\Environment\Console;
use Modules\Customer\Entities\Customer;
use Modules\ParchaseStatus\Entities\PurchaseStatus;
use Modules\OrderTax\Entities\OrderTax;
use Modules\User\Entities\User;
use Modules\Sale\Entities\Sale;
use Modules\Sale\Entities\SaleProductDetails;
use Modules\Sale\Entities\SaleProductInvoiceDetail;
use Modules\Bank\Entities\Bank;
use DB;
use app\Helpers\Helper;
use PDF;

use Response;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $salelists = SaleProductInvoiceDetail::orderBy('warehouse_id', 'ASC')->get();
        return view('sale::index', compact('salelists'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $warehouses = WareHouse::orderBy('id', 'DESC')->get();
        $customers = Customer::all();
        $purchasestatus = PurchaseStatus::all();
        $ordertax = OrderTax::all();
        $users = User::all();
        $bank = Bank::all();
        $products = Product::all();
        return view('sale::create',compact('warehouses','customers', 'purchasestatus','ordertax', 'users','bank', 'products'));
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
        
        $sale_referent_no = Helper::Idgeneratore(new SaleProductInvoiceDetail, 'referent_no', 5, 'T24');
        
        $sale = new SaleProductInvoiceDetail;
        $sale->referent_no = $sale_referent_no;
        $sale->warehouse_id = $request->warehouse;
        $sale->input_customer = $request->input_customer;
        $sale->customer_id = $request->select_customer;
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
        if($request->bank !=''){
            $sale->bank_id = $request->bank;
        }
        if($request->bank_branch !=''){
            $sale->bank_branch = $request->bank_branch;
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
            return Response::json(array('success' => true, 'message' => 'Sale has been added succesefully.'));
        } else {
            return Response::json(array('success' => false, 'message' => 'Sale has not been added. There is something wrong.'));
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
        $warehouses = WareHouse::orderBy('id', 'DESC')->get();
        $customers = Customer::all();
        $purchasestatus = PurchaseStatus::all();
        $ordertax = OrderTax::all();
        $users = User::all();
        $bank = Bank::all();
        $sale = SaleProductInvoiceDetail::find($id);
        $products = Product::all();
        $sale_products_id = DB::table('sale_product_details')
                                ->join('sale_product_invoice_details','sale_product_invoice_details.id', 'sale_product_details.sale_product_invoice_id')
                                ->join('products','sale_product_details.product_id','products.id')
                                ->where('sale_product_details.sale_product_invoice_id',$id)
                                ->get();

        return view('sale::edit', compact('warehouses','customers', 'purchasestatus','ordertax', 'users','bank', 'sale','products','sale_products_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
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

        $sale_products = SaleProductDetails::where('sale_product_invoice_id', $id)->get();
        foreach($sale_products as $sale_product){
        $product = Product::where('id', $sale_product->product_id)->first();
             
        
        $product->save();

        }

        $delete_products = SaleProductDetails::where('sale_product_invoice_id', $id)->delete();
        $delete_products_invoice = SaleProductInvoiceDetail::where('id', $id)->delete();

    

        $sale = new SaleProductInvoiceDetail;
        $sale->referent_no = str_pad(1, 4, '0', STR_PAD_LEFT);
        $sale->warehouse_id = $request->warehouse;
        $sale->input_customer = $request->input_customer;
        $sale->customer_id = $request->select_customer;
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
        if($request->bank !=''){
            $sale->bank_id = $request->bank;
        }
        if($request->bank_branch !=''){
            $sale->bank_branch = $request->bank_branch;
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


        if($request->file('sale_document')){
            $file = $request->file('sale_document');
            @unlink(public_path('upload/sale_documents/'.$sale->sale_document));
            $filename =date('YmdHi').$file->getClientORiginalName();
            $file->move(public_path('upload/sale_documents'), $filename);
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
            return Response::json(array('success' => true, 'message' => 'Sale has been updated succesefully.'));
        } else {
            return Response::json(array('success' => false, 'message' => 'Sale has not been updated. There is something wrong'));
        }

        }else{
            return Response::json(array('success' => false, 'message' => $name.' is out of stock'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sale_products = SaleProductDetails::where('sale_product_invoice_id', $id)->get();
        foreach($sale_products as $sale_product){

            $product = Product::where('id', $sale_product->product_id)->first();
            $product->stock_quantity = $product->stock_quantity + $sale_product->quantity;

            
            $product->save();
        }
        $delete_products = SaleProductDetails::where('sale_product_invoice_id', $id)->delete();
        $delete_products_invoice = SaleProductInvoiceDetail::where('id', $id)->delete();

        if ($delete_products && $delete_products_invoice) {
            return back()->with('message','Sale has been deleted succesefully.');
        } else {
            return back()->with('message','Sale has not been delete. There is something wrong.');
        }

    }

    public function view($id){
        
        $salelists = SaleProductInvoiceDetail::find($id);
        return view('sale::index', compact('salelists'));
    }

    
       public function salepdf($id) {
        $salelists = SaleProductInvoiceDetail::find($id);
        $pdf = PDF::loadView('sale::pdf', compact('salelists'));
        return $pdf->download('sale::index');
}


}
