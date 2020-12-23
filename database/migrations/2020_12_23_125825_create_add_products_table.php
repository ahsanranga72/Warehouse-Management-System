<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_products', function (Blueprint $table) {
            $table->id();
            $table->String('productType')->nullable();
            $table->String('productName')->nullable();
            $table->String('productCode')->nullable();
            $table->String('barcodeSymbology')->nullable();
            $table->String('brand')->nullable();
            $table->String('category')->nullable();
            $table->String('productUnit')->nullable();
            $table->String('saleUnit')->nullable();
            $table->String('purchaseUnit')->nullable();
            $table->String('productCost')->nullable();
            $table->String('productPrice')->nullable();
            $table->String('productTax')->nullable();
            $table->String('taxMethod')->nullable();
            $table->String('productImage')->nullable();
            $table->String('productDetails')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_products');
    }
}
