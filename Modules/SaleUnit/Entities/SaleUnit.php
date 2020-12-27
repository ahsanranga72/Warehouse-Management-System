<?php

namespace Modules\SaleUnit\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleUnit extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\SaleUnit\Database\factories\SaleUnitFactory::new();
    }
}
