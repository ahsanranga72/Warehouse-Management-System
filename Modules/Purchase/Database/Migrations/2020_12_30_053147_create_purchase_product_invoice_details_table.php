<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Purchase\Entities\PurchaseProductInvoiceDetails;

class CreatePurchaseProductInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('warehouse_id')->nullable();
            $table->Integer('supplier_id')->nullable();
            $table->Integer('purchase_status_id')->nullable();
            $table->String('purchase_document',255)->nullable();
            $table->Integer('order_tax_id')->nullable();
            $table->text('note')->nullable();
            $table->integer('items')->nullable();
            $table->float('total')->nullable();
            $table->float('order_tax')->nullable();
            $table->float('order_discount')->nullable();
            $table->float('order_shipping_cost')->nullable();
            $table->float('grand_total')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('purchase_product_invoice_details');
    }
}
