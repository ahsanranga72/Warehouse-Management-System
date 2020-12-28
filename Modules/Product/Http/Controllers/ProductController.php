<?php

namespace Modules\Product\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\ProductType\Entities\ProductType;
use Modules\BarcodeSymbolgy\Entities\BarcodeSymbol;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Modules\ProductUint\Entities\ProductUnit;
use Modules\PurchaseUnit\Entities\PurchaseUnit;
use Modules\SaleUnit\Entities\SaleUnit;
use Modules\TaxMethod\Entities\TaxMethod;
use Modules\Warehouse\Entities\Warehouse;
use Response;


class ProductController extends Controller
{
    public function addproduct(){
        
        $data=ProductType::all();
        $bar=BarcodeSymbol::all();
        $brand=Brand::all();
        $category=Category::all();
        $prounit=ProductUnit::all();
        $purunit=PurchaseUnit::all();
        $salunit=SaleUnit::all();
        $tax=TaxMethod::all();
        $warehouse=Warehouse::all();
        return view('product::add-product',compact('data','bar','brand','category','prounit','purunit','salunit','tax','warehouse'));
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
        $product->warehouse_id = $request->warehouse;
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

    public function productlist(){
        $productlists = Product::all();
        return view('product::product-list', compact('productlists'));
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.list')->with('message', 'Product Deleted Successfully');
    }
}