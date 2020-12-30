<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Purchase\Entities\PurchaseProductDetails;

class CreatePurchaseProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('received_quantity')->nullable();
            $table->float('subtotal')->nullable();
            $table->integer('purchase_product_invoice_id')->nullable();
            $table->integer('return_purchase')->default(0);
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
        Schema::dropIfExists('purchase_product_details');
    }
}
