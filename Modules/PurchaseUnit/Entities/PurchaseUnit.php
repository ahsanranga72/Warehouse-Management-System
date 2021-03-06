<?php

namespace Modules\PurchaseUnit\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseUnit extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\PurchaseUnit\Database\factories\PurchaseUnitFactory::new();
    }
    
    public function productunit()
    {
        return $this->belongsTo('Modules\ProductUint\Entities\ProductUnit', 'parent_id' , 'id');
    }
}
