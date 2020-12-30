<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }

    public function brands()
    {
        return $this->belongsTo('Modules\Brand\Entities\Brand', 'brand' , 'id');
    }

    public function categories()
    {
        return $this->belongsTo('Modules\Category\Entities\Category', 'category' , 'id');
    }

}
