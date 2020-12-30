<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('subtotal')->nullable();
            $table->integer('sale_product_invoice_id')->nullable();
            $table->integer('return_sale')->default(0)->comment('1=Returned');
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
        Schema::dropIfExists('sale_product_details');
    }
}
