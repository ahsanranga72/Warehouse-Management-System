<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleProductInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_product_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->string('referent_no')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->Integer('order_tax_id')->nullable();
            $table->float('order_discount')->nullable();
            $table->float('order_shipping_cost')->nullable();
            $table->String('sale_document')->nullable();
            $table->integer('sale_status_id')->nullable();
            $table->integer('payment_status_id')->nullable()->comment('1=cash,2=cheque');
            $table->integer('paid_by_id')->nullable();
            $table->string('received_amount')->nullable();
            $table->string('paying_amount')->nullable();
            $table->string('charge')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('payment_note')->nullable();
            $table->text('sale_note')->nullable();
            $table->text('staff_note')->nullable();
            $table->integer('items')->nullable();
            $table->float('total')->nullable();
            $table->float('order_tax')->nullable();
            $table->float('grand_total')->nullable();
            $table->boolean('status')->nullable()->comment('True=Active,False=Inactive');
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
        Schema::dropIfExists('sale_product_invoice_details');
    }
}
