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


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('purchase::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //return view('purchase::create');
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        $suppliers = Supplier::all();
        $purchasestatus = PurchaseStatus::all();
        $ordertax = OrderTax::all();
        return view('purchase::create', compact('warehouses', 'suppliers', 'purchasestatus', 'ordertax'));
    }
    public function get_product_list_by_product_code(Request $request)
    {
        if ($request->get('product_code')) {
            $product_code = $request->get('product_code');
            $data = DB::table('products')->where('product_code', 'LIKE', "%{$product_code}%")->get();
            $output = '<ul class="dropdown-menu select-product-list" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
       <li><a href="#">' . $row->product_name . '</a></li>
       ';
            }
            $output .= '</ul>';
            //   print_r($output);
            echo $output;
            exit(0);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storePurchase(Request $request)
    {
      
      
        $purchase = new PurchaseProductInvoiceDetails;
        $purchase->warehouse_id = $request->warehouse;
        $purchase->supplier_id = $request->supplier;
        $purchase->purchase_status_id = $request->purchaseStatus;
        // $purchase->purchase_document = $request->document;
        $purchase->order_tax_id = $request->orderTax;
        $purchase->note = $request->note;
        $purchase->items = $request->items;
        $purchase->total = $request->total;
        $purchase->order_tax = $request->totalOrderTax;
        $purchase->order_discount = $request->orderDiscount;
        $purchase->order_shipping_cost = $request->shippingCost;
        $purchase->grand_total = $request->grandTotal;

        
      
       
        //$purchase->status = $request->status;
        // $purchase->save();
        //     $purchase_id=$purchase->id;
        if ($request->hasfile('document')) {
            $file = $request->file('document');
            $extention = $file->getClientOriginalExtension();
            $filename = date('mdYHis') . uniqid() . '.' . $extention;
            $file->move('upload/purchase_documents/', $filename);
            $purchase->purchase_document = $filename;
        } else {
            //return $request;
            $purchase->purchase_document = "";
        }
     
        $save = $purchase->save();
        // print_r( $save);die();
        if ($save) {
            return Response::json(array('success' => 'true', 'message' => 'Product has been added succesefully.'));
        } else {
            return Response::json(array('success' => 'false', 'message' => 'Product has not been added succesefully.'));
        }


        //    $data = array(
        //             array('id'=>17,'quantity'=>25,'total'=>'1000'),
        //             array('id'=>18,'quantity'=>2000,'total'=>'5000'),

        //    );
        //    for($i=0;$i<sizeof($data);$i++){
        //        print_r($data[$i]);
        //    }
        //     foreach($data as $mydata){
        //             // print_r( $mydata['id']);

        //             $purchaseProductDetails = new PurchaseProductDetails;
        //             $purchaseProductDetails->product_id = $mydata['id'];
        //             $purchaseProductDetails->quantity = $mydata['quantity'];
        //            // $purchaseProductDetails->received_quantity = $request->received_quantity;
        //             $purchaseProductDetails->subtotal =$mydata['total'];;
        //             $purchaseProductDetails->purchase_product_invoice_id = $purchase_id;
        //             $purchaseProductDetails->return_purchase = false;
        //             $purchaseProductDetails->save();



        //             $product = Product::where('id',$mydata['id'])->first(); 
        //             $product->stock_quantity= $product->stock_quantity + $mydata['quantity'];
        //             $product->save();

        //     }
        //  for( i=0; i<=$request->list as $list):
        //         print_r($list);
        //  endforeach;
        //  die();



        //  $updateStock->save();

        // print_r($request->quantity);


        // if($request->hasfile('product_image')){
        //     $file = $request->file('product_image');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename =date('mdYHis') . uniqid() .'.'.$extention;
        //     $file->move('upload/product_images/',$filename);
        //     $product->product_image = $filename;
        // } else {
        //     //return $request;
        //     $product->product_image = "";
        // }

        //    $save = $product->save();
        //    if($save){
        //     return Response::json(array('success' => 'true', 'message' => 'Product has been added succesefully.'));
        //    }else{
        //     return Response::json(array('success' => 'false', 'message' => 'Product has not been added succesefully.'));
        //    }

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
