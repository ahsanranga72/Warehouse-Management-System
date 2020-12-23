<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddProduct;

class ProductController extends Controller
{
    public function addproduct(){
        return view('product.add-product');
    }

    public function storeproduct(Request $request){

        $product = New AddProduct;
        $product->productType = $request->productType;
        $product->productName = $request->productName;
        $product->productCode = $request->productCode;
        $product->barcodeSymbology = $request->barcodeSymbology;
        $product->brand = $request->brand;
        $product->category = $request->category;
        $product->productUnit = $request->productUnit;
        $product->saleUnit = $request->saleUnit;
        $product->purchaseUnit = $request->purchaseUnit;
        $product->productCost = $request->productCost;
        $product->productPrice = $request->productPrice;
        $product->productTax = $request->productTax;
        $product->taxMethod = $request->taxMethod;
        $product->productImage = $request->productImage;
        $product->productDetails = $request->summernote;
        $product->save();
    }
}
