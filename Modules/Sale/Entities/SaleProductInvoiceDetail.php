<?php

namespace Modules\Sale\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleProductInvoiceDetail extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Sale\Database\factories\SaleProductInvoiceDetailFactory::new();
    }

    public function user(){
        return $this->belongsTo('Modules\User\Entities\User', 'user_id', 'id' );
    }

    public function customer(){
        return $this->belongsTo('Modules\Customer\Entities\Customer', 'customer_id', 'id' );
    }

    public function paymentstats(){
        return $this->belongsTo('Modules\Customer\Entities\Customer', 'customer_id', 'id' );
    }

    public function wareee(){
        return $this->belongsTo('Modules\Warehouse\Entities\WareHouse', 'warehouse_id', 'id' );
    }

    public function product(){
        return $this->belongsTo('Modules\Product\Entities\Product', 'id', 'id' );
    }

    // public function saleproduct(){
    //     return $this->hasMany('Modules\Sale\Entities\SaleProductDetails', 'id', 'sale_product_invoice_id' );
    // }
}
