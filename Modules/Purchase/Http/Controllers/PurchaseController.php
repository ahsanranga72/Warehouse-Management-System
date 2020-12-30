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
        return view('purchase::create', compact('warehouses','suppliers', 'purchasestatus'));
    }
    public function get_product_list_by_product_code(Request $request)
    {
     if($request->get('product_code'))
     {
      $product_code = $request->get('product_code');
      $data = DB::table('products')->where('product_code', 'LIKE', "%{$product_code}%")->get();
      $output = '<ul class="dropdown-menu select-product-list" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->product_name.'</a></li>
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
    public function store(Request $request)
    {
        
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
