<?php

namespace Modules\Purchase\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseProductInvoiceDetails extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Purchase\Database\factories\PurchaseProductInvoiceDetailsFactory::new();
    }

    public function suplier(){
        return $this->belongsTo('Modules\Supplier\Entities\Supplier', 'supplier_id', 'id' );
    }

    public function purchasestatus()
    {
        return $this->belongsTo('Modules\ParchaseStatus\Entities\PurchaseStatus', 'purchase_status_id' , 'id');
    }
}
