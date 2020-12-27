<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->Integer('product_type')->nullable();
            $table->String('product_name',50)->nullable();
            $table->String('product_code',50)->nullable();
            $table->Integer('barcode_symbology')->nullable();
            $table->Integer('brand')->nullable();
            $table->Integer('category')->nullable();
            $table->Integer('product_unit')->nullable();
            $table->Integer('sale_unit')->nullable();
            $table->Integer('purchase_unit')->nullable();
            $table->Float('product_cost')->nullable();
            $table->Float('product_price')->nullable();
            $table->Float('alert_quantity')->nullable();
            $table->Float('product_tax')->nullable();
            $table->Integer('tax_method')->nullable();
            $table->Integer('warehouse_id')->default(0);
            $table->Integer('stock_quantity')->nullable();
            $table->String('product_image',255)->nullable();
            $table->Text('product_details')->nullable();
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
        Schema::dropIfExists('products');
    }
}
