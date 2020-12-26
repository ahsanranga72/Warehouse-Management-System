<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\ProductType;
use App\Models\Product\BarcodeSymbology;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\ProductUnit;
use App\Models\Product\PurchaseUnit;
use App\Models\Product\SaleUnit;
use App\Models\Product\TaxMethod;
use Response;

class ProductController extends Controller
{
    public function addproduct(){
        
        $data=ProductType::all();
        $bar=BarcodeSymbology::all();
        $brand=Brand::all();
        $category=Category::all();
        $prounit=ProductUnit::all();
        $purunit=PurchaseUnit::all();
        $salunit=SaleUnit::all();
        $tax=TaxMethod::all();
        return view('product.add-product',compact('data','bar','brand','category','prounit','purunit','salunit','tax'));
        //return view('product.add-product',['bar'=>$bar]);
    }

    public function storeproduct(Request $request){
        //  print_r($request->all());die();
        $product = New Product;
        $product->product_type = $request->product_type;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->barcode_symbology = $request->barcode_symbology;
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->product_unit = $request->product_unit;
        $product->sale_unit = $request->sale_unit;
        $product->purchase_unit = $request->purchase_unit;
        $product->product_cost = $request->product_cost;
        $product->product_price = $request->product_price;
        $product->alert_quantity = $request->alert_quantity;
        $product->product_tax = $request->product_tax;
        $product->tax_method = $request->tax_method;
        $product->product_details = $request->product_details;
        
        if($request->hasfile('product_image')){
            $file = $request->file('product_image');
            $extention = $file->getClientOriginalExtension();
            $filename =date('mdYHis') . uniqid() .'.'.$extention;
            $file->move('upload/product_images/',$filename);
            $product->product_image = $filename;
        } else {
            //return $request;
            $product->product_image = "";
        }
     
           $save = $product->save();
           if($save){
            return Response::json(array('success' => 'true', 'message' => 'Product has been added succesefully.'));
           }else{
            return Response::json(array('success' => 'false', 'message' => 'Product has not been added succesefully.'));
           }


    }
}
